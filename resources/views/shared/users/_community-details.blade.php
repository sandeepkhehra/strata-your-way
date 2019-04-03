<div class="card mb-3">
	<div class="card-header">Community Details</div>
	<div class="card-body">
		<table>
			<tbody>
				<tr>
					<td><strong>{{ $user->community->name }}</strong></td>
				</tr>
				<tr>
					<td><i class="fa fa-phone"></i> <a href="tel:{{ $user->community->details->phone }}"><strong>{{ $user->community->details->phone }}</strong></a></td>
					<td><i class="fa fa-envelope"></i> <a href="mailto:{{ $user->community->email }}"><strong>{{ $user->community->email }}</strong></a></td>
				</tr>
				<tr>
					<td colspan="2"><i class="fa fa-home"></i> <strong>{{ $user->community->details->address }}</strong></td>
				</tr>
				@if ($user->type === 0)
					<tr>
						<td class="pt-3"><a href="{{ route('community.edit', $user->community->id) }}">Edit details &rarr;</a></td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>