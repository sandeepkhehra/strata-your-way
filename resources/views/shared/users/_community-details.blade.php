<div class="card mb-3">
	<div class="card-header">Community Details</div>
	<div class="card-body">
		<table class="table m-0">
			<tbody>
				<tr>
					<td colspan="3"><strong>{{ $admin->community->name }}</strong></td>
				</tr>
				<tr>
					<td><i class="fa fa-phone"></i> <a href="tel:{{ $admin->community->details->phone }}"><strong>{{ $admin->community->details->phone }}</strong></a></td>
					<td colspan="2"><i class="fa fa-envelope"></i> <a href="mailto:{{ $admin->community->email }}"><strong>{{ $admin->community->email }}</strong></a></td>
				</tr>
				<tr>
					<td colspan="3" title="Address"><i class="fa fa-home"></i> <strong>{{ $admin->community->details->address }}</strong></td>
				</tr>
				@if ($admin->type === 0)
					<tr>
						<td colspan="3" class="pt-3" title="Bank"><i class="fa fa-bank"></i> {{ $admin->community->details->bank }}</td>
					</tr>
					<tr>
						<td colspan="3" class="pt-3" title="BPAY"><i class="fa fa-money"></i> {{ $admin->community->details->bpay }}</td>
					</tr>
					<tr>
						<td class="pt-3"><a href="{{ route('community.edit', $admin->community->id) }}">Edit details &rarr;</a></td>
						<td class="pt-3"><a href="#" data-toggle="modal" data-target="#community-link">Send Link to Owners &rarr;</a></td>
						<td class="pt-3"><a href="#" data-toggle="modal" data-target="#import-owner">Import Owners &rarr;</a></td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>