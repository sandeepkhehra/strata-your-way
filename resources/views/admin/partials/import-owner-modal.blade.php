<div
    class="modal fade"
    id="import-owner"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Import Owners</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<form id="import-csv-user" enctype="multipart/form-data">
				<div class="modal-body container">
					<div class="form-group row">
						<div class="col-md-12 text-center">
							<a href="{{ asset('storage/files/csv_template.csv') }}" class="btn btn-secondary" download="User Import CSV Template.csv">Download CSV Import Template</a>
							<button type="button" class="btn btn-primary" id="toggle-import-form">Import CSV File</button>
						</div>
					</div>

					<div class="form-group row d-none" data-import-form>
						<div class="col-md-12 input-group">
							<div class="custom-file">
								<input type="file" name="import-csv" class="custom-file-input" id="import-csv" required>
								<label class="custom-file-label" for="import-csv">Choose CSV file</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer d-none" data-import-form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Import</button>
				</div>
			</form>
        </div>
    </div>
</div>
