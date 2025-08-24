 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin-dashboard" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline liveSearch" >
      <div class="input-group input-group-sm" style="position: relative;">
        <input class="form-control form-control-navbar dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"   type="search" name="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
    
      </div>
         <ul class="list-group liveSearchResult dropdown-menu" ></ul>
    </form>

    <?php if($this->session->userdata('user_datail') === 'user_detail_page'): ?>
    <ul class="navbar-nav ">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin-dashboard" class="nav-link" data-toggle="modal" data-target="#walletModel"><button class="btn btn-primary btn-sm">Add Wallet Money</button></a>
      </li>
    </ul>
    <?php endif; ?>
  </nav>

  <div class="modal " id="walletModel"  role="dialog" aria-labelledby="walletModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form id="addWalletForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="walletModelLabel">Add Wallet Money</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label>Credit Amount</label>
          <input class="form-control"  type="number" name="credit_amount" placeholder="Amount" aria-label="Amount">
          <input class="form-control"  type="hidden" name="user_id" value="<?= $this->uri->segment(2) ?>" aria-label="Search"> 
          <p id="addMoney"></p>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      </form>
    </div>
  </div>
        <?php $this->session->unset_userdata('user_datail') ?>