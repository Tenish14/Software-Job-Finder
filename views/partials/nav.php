<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #87ceeb; font-size: .9rem;">
  <img src="/../assets/img/logo/job_finder.png" style="height: 4rem; width: auto;" class="pr-4">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <!-- <h1 class="my-auto" style="font-family: 'Libre Barcode 128 Text', cursive;, cursive;">Here is your Future Software <span class="txt-rotate" data-period="2000" data-rotate='[ "Job.", "Carrer.", "Dream.", "Profession."]'></span></h1> -->
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/../index.php">Home<i class="fa fa-home pl-2" aria-hidden="true"></i> </a>
      </li>
    </ul>
    <?php if(!isset($_SESSION['user'])): ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="/views/forms/login.php">Log In <i class="fa fa-user px-auto" aria-hidden="true"><span class="pl-2" style="color: lightgrey;"> |</span></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="#" data-toggle="modal" data-target="#exampleModalCenter">Register<span class="pl-2"><i class="fa fa-user-plus" aria-hidden="true" ></i></span></a>
        </li>
      </ul>

      <?php elseif($_SESSION['user']->isEmployer == true): ?>
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a href="/views/forms/forms_type/employer.php" class="nav-link">Add Jobs <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a href="/views/view_posts.php" class="nav-link">My Posted Jobs <i class="fa fa-address-card-o" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a href="/views/view_applicants.php" class="nav-link">View Applicants <i class="fa fa-eye" aria-hidden="true"></i></a>
          </li>
        </ul>

        <?php elseif($_SESSION['user']->isEmployer == false): ?>
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a href="/views/job_status.php" class="nav-link">Job Status <i class="fa fa-spinner" aria-hidden="true"></i>
</a>
            </li>
          </ul>
        <?php endif; ?> 


        <?php if(isset($_SESSION['user'])){ ?>
          <ul class="navbar-nav pl-auto">
            <li class="nav-item ">
              <a class="nav-link " href="/routes/logout.php" style="color: #108be4;">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        <?php } ?>
      </div>
    </nav>
    
    <!-- ---------------------------------------------------------------------------------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you register as 
          </div>
          <div class="modal-footer">
            <a type="button" href="/views/forms/register_type/job_hunter.php" class="btn btn-info">Job Seeker</a>
            <a type="button" href="/views/forms/register_type/employer.php" class="btn btn-warning">Employer</a>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      var TxtRotate = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 7) || 500;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
      };

      TxtRotate.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
          this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
          this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta =  200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
          delta = this.period;
          this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
          this.isDeleting = false;
          this.loopNum++;
          delta = 500;
        }

        setTimeout(function() {
          that.tick();
        }, delta);
      };

      window.onload = function() {
        var elements = document.getElementsByClassName('txt-rotate');
        for (var i=0; i<elements.length; i++) {
          var toRotate = elements[i].getAttribute('data-rotate');
          var period = elements[i].getAttribute('data-period');
          if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
          }
        }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
    document.body.appendChild(css);
  };



  Resources
</script>  