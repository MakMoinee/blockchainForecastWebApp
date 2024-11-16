<div>
    <button style="display: none" id="btnErrorModal" data-target="#errorModal" data-toggle="modal"></button>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-card">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 padding-20">
                        <center>
                            <h5>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#d11500"
                                        class="bi bi-exclamation-square-fill" viewBox="0 0 24 24">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg></span> <b id="errorMsg"></b>
                            </h5>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display:none;"
                                id="btnCloseErrorModal">Close</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>