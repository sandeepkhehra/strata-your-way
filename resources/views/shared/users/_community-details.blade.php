<div class="card mb-3">
	<div class="card-header">Community Details</div>
	<div class="card-body">
		<table>
			<tbody>
				<tr>
					<td><strong>{{ $admin->community->name }}</strong></td>
				</tr>
				<tr>
					<td><i class="fa fa-phone"></i> <a href="tel:{{ $admin->community->details->phone }}"><strong>{{ $admin->community->details->phone }}</strong></a></td>
					<td><i class="fa fa-envelope"></i> <a href="mailto:{{ $admin->community->email }}"><strong>{{ $admin->community->email }}</strong></a></td>
				</tr>
				<tr>
					<td colspan="2"><i class="fa fa-home"></i> <strong>{{ $admin->community->details->address }}</strong></td>
				</tr>
				@if ($admin->type === 0)
					<tr>
						<td class="pt-3"><a href="{{ route('community.edit', $admin->community->id) }}">Edit details &rarr;</a></td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>