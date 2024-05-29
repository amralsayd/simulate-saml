<?php

include "inc.php";

// Reading the HTTP Request
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <!-- <link href="assets/signin.css" rel="stylesheet"> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>

  <body class="bg-light">


    <form class="form-signin">
        


<div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://www.iam.gov.sa/img/logo.png" alt="" width="72" height="72">
    <h2>Simulate nafaz login</h2>

  </div>

  <div class="row">
    <!-- <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li>
      </ul>

      <div class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </div>
    </div> -->
    <div class="col-md-12 order-md-1">

        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">National ID</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="NationalId" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <!-- <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <input type="hidden" name="SAMLRequest" value="<?php print $request->get("SAMLRequest") ?>">
        <input type="hidden" name="RelayState" value="<?php print $request->get("RelayState") ?>">




            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Extra fields
                        </button>
                    </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        



                    <h4 class="mb-3">الاسم باللغة العربية</h4>
      <div class="needs-validation">
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="firstName">الاسم الاول</label>
            <input type="text" class="form-control" id="arabicFirstName" name="arabicFirstName" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">اسم الاب</label>
            <input type="text" class="form-control" id="arabicFatherName" name="arabicFatherName" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">اسم الجد</label>
            <input type="text" class="form-control" id="arabicGrandFatherName" name="arabicGrandFatherName" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">اسم العائلة</label>
            <input type="text" class="form-control" id="arabicFamilyName" name="arabicFamilyName" placeholder="" value="">
          </div>
        </div>

        <h4 class="mb-3">Name in English</h4>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="englishFirstName" name="englishFirstName" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Father name</label>
            <input type="text" class="form-control" id="englishFatherName" name="englishFatherName" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Grand father name</label>
            <input type="text" class="form-control" id="englishGrandFatherName" name="englishGrandFatherName" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">Family name</label>
            <input type="text" class="form-control" id="englishFamilyName" name="englishFamilyName" placeholder="" value="">
          </div>
        </div>

        <h4 class="mb-3">نوع الهوية</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">مقيم</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">مواطن</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">أخرى</label>
          </div>
        </div>


        <h4 class="mb-3">تاريخ الميلاد</h4>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="firstName">ميلادي</label>
            <input type="text" class="form-control" id="dob" name="dob" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">هجري</label>
            <input type="text" class="form-control" id="dobHijri" name="dobHijri" placeholder="" value="">
          </div>
        </div>

        <h4 class="mb-3">بطاقة الهوية</h4>
        <div class="row">
          <div class="col-md-2 mb-2">
            <label for="firstName">تاريخ الاصدار ميلادي</label>
            <input type="text" class="form-control" id="cardIssueDateGregorian" name="cardIssueDateGregorian" placeholder="" value="">
          </div>
          <div class="col-md-2 mb-2">
            <label for="lastName">تاريخ الاصدار هجري</label>
            <input type="text" class="form-control" id="cardIssueDateHijri" name="cardIssueDateHijri" placeholder="" value="">
          </div>

          <div class="col-md-2 mb-2">
            <label for="firstName">تاريخ الانتهاء ميلادي</label>
            <input type="text" class="form-control" id="idExpiryDateGregorian" name="idExpiryDateGregorian" placeholder="" value="">
          </div>
          <div class="col-md-2 mb-2">
            <label for="lastName">تاريخ الانتهاء هجري</label>
            <input type="text" class="form-control" id="idExpiryDateHijri" name="idExpiryDateHijri" placeholder="" value="">
          </div>
          
          <div class="col-md-2 mb-2">
            <label for="lastName">مكان الاصدار</label>
            <input type="text" class="form-control" id="issueLocationAr" name="issueLocationAr" placeholder="" value="">
          </div>
          <div class="col-md-2 mb-2">
            <label for="lastName">نوع الاصدار</label>
            <input type="text" class="form-control" id="idVersionNo" name="idVersionNo" placeholder="" value="">
          </div>

        </div>


        <h4 class="mb-3">الاقامة</h4>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="firstName">تاريخ الانتهاء ميلادي</label>
            <input type="text" class="form-control" id="iqamaExpiryDateGregorian" name="iqamaExpiryDateGregorian" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">تاريخ الانتهاء هجري</label>
            <input type="text" class="form-control" id="iqamaExpiryDateHijri" name="iqamaExpiryDateHijri" placeholder="" value="">
          </div>
        </div>

        <h4 class="mb-3">الجنسية</h4>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="firstName">الجنسية باللغة العربية</label>
            <input type="text" class="form-control" id="arabicNationality" name="arabicNationality" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">الجنسية باللغة الانجليزية</label>
            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="" value="">
          </div>
          <div class="col-md-3 mb-3">
            <label for="lastName">كود الجنسية</label>
            <input type="text" class="form-control" id="nationalityCode" name="nationalityCode" placeholder="" value="">
          </div>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
                <input id="male" name="gender" type="radio" class="custom-control-input">
                <label class="custom-control-label" for="male">ذكر</label>
            </div>
            <div class="custom-control custom-radio">
                <input id="female" name="gender" type="radio" class="custom-control-input">
                <label class="custom-control-label" for="female">انثى</label>
            </div>
          </div>

          <div class="col-md-3 mb-3">
            <label for="lastName">اللغة</label>
            <input type="text" class="form-control" id="lang" name="lang" placeholder="" value="">
          </div>

          <div class="col-md-3 mb-3">
            <label for="lastName">اللغة المفضلة</label>
            <input type="text" class="form-control" id="preferredLang" name="preferredLang" placeholder="" value="">
          </div>

        </div>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Register (Update)</button>


                    </div>
                    </div>
                </div>
            </div>

        </div>
    </form>




  </body>
</html>