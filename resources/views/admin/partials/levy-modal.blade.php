<div
    class="modal fade"
    id="levy-modal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Generate Levy Split by Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<form id="generate-levy-report">
				<div class="modal-body container">
					<div class="form-group row">
						<label for="period" class="col-md-12 col-form-label">What period is the calculation for?</label>
						<div class="col-md-12">
							<select name="period" id="period" class="form-control">
								<option value="quarterly">Quarterly</option>
								<option value="annual">Annual</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="period" class="col-md-12 col-form-label">What is the value of the administration fund levies for this period?</label>
						<div class="col-md-12 input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="adm-fund-doll">$</span>
							</div>
							<input type="text" name="adm" class="form-control" placeholder="e.g. 9000" aria-label="e.g. 9000" aria-describedby="adm-fund-doll">
						</div>
					</div>
					<div class="form-group row">
						<label for="period" class="col-md-12 col-form-label">What is the value of the sinking fund levies for this period?</label>
						<div class="col-md-12 input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="sink-fund-doll">$</span>
							</div>
							<input type="text" name="sink" class="form-control" placeholder="e.g. 9000" aria-label="e.g. 9000" aria-describedby="sink-fund-doll">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Report</button>
				</div>
			</form>
        </div>
    </div>
</div>
