<?php include("../components/header_generic.php") ?>
<?php include("../components/navbar.php") ?>
<div class="container text-center">
    <div class="row justify-content-center align-items-center mt-3" style="min-height: 100vh">
        <div class="col-4">
            <h3 class="wtext">Membership Statusssss</h3>
            <form>
                <div class="input-group mb-3">
                    <input id="membership-input" type="text" class="form-control" placeholder="Name or ID" aria-label="Name or ID" aria-describedby="button-addon2">
                    <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" type="button" id="searchMembership">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include("../components/footer_generic.php") ?>