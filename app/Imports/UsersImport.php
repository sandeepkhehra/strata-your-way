<?php

namespace App\Imports;

use App\User;
use App\UserDetail;
use App\Community;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
		try {
			Validator::make($rows->toArray(), [
				'*.email_address_1' => 'required|email',
				'*.email_address_2' => 'required|email',
				'*.email_address_3' => 'required|email',
				'*.mobile_number' => 'required',
			])->validate();

			foreach ($rows as $row) {
				$allUserDetails = UserDetail::get('details');

				foreach ($allUserDetails as $userDetail) :
					if ($userDetail->details->tel->mobile == $row['mobile_number']) :
						echo json_encode([
							'type' => 'error',
							'msg' => 'This mobile number already exists!',
						]);
						die();
					endif;
				endforeach;

				$user = User::create([
					'name' => $row['name'],
					'password' => Hash::make($row['email_address_1']),
					'email' => $row['email_address_1'],
					'type' => 1,
					'imported_by' => Auth::user()->community->id,
				]);

				$rawDetails = [
					'uno' => $row['user_no'],
					'tel' => [
						'home' => $row['home_phone_number'],
						'mobile' => $row['mobile_number'],
					],
					'area' => $row['area'],
					'email' => [
						'1' => $row['email_address_1'],
						'2' => $row['email_address_2'],
						'3' => $row['email_address_3'],
					],
					'medium' => null,
					'address' => [
						'1' => $row['address_line_1'],
						'2' => $row['address_line_2'],
						'postal' => $row['post_code'],
						'country' => 'AUS',
						'state' => $row['state'],
					],
					'communication' => null,
				];

				$userDetail = UserDetail::create([
					'user_id' => $user->id,
					'details' => $rawDetails,
				]);
			}

			echo json_encode([
				'type' => 'success',
				'msg' => 'Users imported successfully!',
			]);
		} catch (\Illuminate\Database\QueryException $exception) {
			$errorInfo = $exception->errorInfo;
			echo json_encode([
				'type' => 'error',
				'msg' => $errorInfo[2],
			]);
		}
	}
}
