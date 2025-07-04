function signUp() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var f = new FormData();

  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("u", username.value);
  f.append("p", password.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //alert(response);
      if (response == "success") {
        swal("Techno.com", "Registration Successfully", "success");
        location.reload();

        fname.value = "";
        lname.value = "";
        email.value = "";
        mobile.value = "";
        username.value = "";
        password.value = "";

      } else {

        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block"
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(f);
}





function signIn() {

  var un = document.getElementById("un");
  var pw = document.getElementById("pw");
  var rm = document.getElementById("rm");

  //alert(un.value);

  var f = new FormData();
  f.append("u", un.value);
  f.append("p", pw.value);
  f.append("r", rm.checked);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      //alert(response);
      if (response == "Success") {
        window.location = "home.php";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }
    }
  }

  request.open("POST", "signInProcess.php", true);
  request.send(f);

}

var subMenu = document.getElementById("subMenu");


function toggleMenu() {
  subMenu.classList.toggle("open-menu");
}

var subMenuAdmin = document.getElementById("subMenuAdmin");

function toggleMenuAdmin() {
  subMenu.classList.toggle("open-menuAdmin");
}





function adminSignIn() {
  //alert("Ok");

  var un = document.getElementById("un");
  var pw = document.getElementById("pw");

  var f = new FormData();

  f.append("u", un.value);
  f.append("p", pw.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        window.location = "adminHome.php";
      } else {
        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgDiv3").className = "d-block";
      }
    }
  }

  request.open("POST", "adminSignInProcess.php", true);
  request.send(f);

}







function productReg() {

  var cat_s = document.getElementById("cat_s");
  var cat_i = document.getElementById("cat_i");
  var br_s = document.getElementById("br_s");
  var br_i = document.getElementById("br_i");
  var m_s = document.getElementById("m_s");
  var m_i = document.getElementById("m_i");
  var co_s = document.getElementById("co_s");
  var co_i = document.getElementById("co_i");
  var title = document.getElementById("title");
  var condition = 0;

  if (document.getElementById("r_b").checked) {
    condition = 1;
  } else if (document.getElementById("r_u").checked) {
    condition = 2;
  }
  var qty = document.getElementById("qty");
  var p = document.getElementById("p");
  var s = document.getElementById("s");
  var des = document.getElementById("des");
  var image = document.getElementById("imageuploader");


  var f = new FormData();
  f.append("cat_s", cat_s.value);
  f.append("cat_i", cat_i.value);
  f.append("br_s", br_s.value);
  f.append("br_i", br_i.value);
  f.append("m_s", m_s.value);
  f.append("m_i", m_i.value);
  f.append("co_s", co_s.value);
  f.append("co_i", co_i.value);
  f.append("title", title.value);
  f.append("con", condition);
  f.append("qty", qty.value);
  f.append("p", p.value);
  f.append("s", s.value);
  f.append("des", des.value);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    f.append("image" + x, image.files[x]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;

      if (response == "success") {
        swal("techno.com", "Product Saved Successfully.", "success");
        window.location.reload();
      } else {
        swal("techno.com", response, "warning");
      }
    }
  }

  request.open("POST", "addProductProcess.php", true);
  request.send(f);

}





function changeProductImage() {

  var image = document.getElementById("imageuploader");

  image.onchange = function () {
    var file_count = image.files.length;

    if (file_count <= 3) {

      for (var x = 0; x < file_count; x++) {

        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("i" + x).src = url;
      }

    } else {
      alert(file_count + " files. You are proceed to upload only 3 or less than 3 files.");
    }
  }

}


function addCatProcess() {
  // alert("Ok");

  var cat_i = document.getElementById("cat_i");

  var f = new FormData();
  f.append("cat_i", cat_i.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;

      if (response == "success") {
        swal("techno.com", "Category Saved Successfully.", "success");
        window.location.reload();
      } else {
        swal("techno.com", response, "warning");
      }
    }
  }

  request.open("POST", "addCatprocess.php", true);
  request.send(f);


}

function addbrProcess() {
  // alert("ok");

  var br_i = document.getElementById("br_i");

  var f = new FormData();
  f.append("br_i", br_i.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;

      if (response == "success") {
        swal("techno.com", "Brand Saved Successfully.", "success");
        window.location.reload();
      } else {
        swal("techno.com", response, "warning");
      }
    }
  }

  request.open("POST", "addBrprocess.php", true);
  request.send(f);
}

function addMProcess() {
  // alert("ok");

  var m_i = document.getElementById("m_i");

  var f = new FormData();
  f.append("m_i", m_i.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;

      if (response == "success") {
        swal("techno.com", "Model Saved Successfully.", "success");
        window.location.reload();
      } else {
        swal("techno.com", response, "warning");
      }
    }
  }

  request.open("POST", "addMprocess.php", true);
  request.send(f);
}


function addCoProcess() {
  // alert("ok");

  var co_i = document.getElementById("co_i");

  var f = new FormData();
  f.append("co_i", co_i.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;

      if (response == "success") {
        swal("techno.com", "Colour Saved Successfully.", "success");
        window.location.reload();
      } else {
        swal("techno.com", response, "warning");
      }
    }
  }

  request.open("POST", "addCoprocess.php", true);
  request.send(f);
}

function loadProduct(x) {

  var page = x;
  // alert(x);

  var f = new FormData();
  f.append("page", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("cid").innerHTML = response;
    }
  }
  request.open("POST", "loadProductProcess.php", true);
  request.send(f);
}

function searchProduct(x) {
  // alert("ok");

  var page = x;
  var product = document.getElementById("product");

  // alert(page);
  // alert(product.value);

  var f = new FormData();
  f.append("p", product.value);
  f.append("pg", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("cid").innerHTML = response;
      document.getElementById("cors").className = "d-none";
    }
  }
  request.open("POST", "searchProductProcess.php", true);
  request.send(f);
}

function signOut() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      window.location.reload();

    }

  };
  request.open("POST", "signOutProcess.php", true);
  request.send();
}

function showPassword1() {

  var npi = document.getElementById("npi");
  var npb = document.getElementById("npb");

  if (npi.type == "password") {
    npi.type = "text";
    npb.innerHTML = '<i class="bi bi-eye"></i>';
  } else {
    npi.type = "password";
    npb.innerHTML = '<i class="bi bi-eye-slash">';
  }
}

function showPassword2() {
  var rnpi = document.getElementById("rnpi");
  var rnpb = document.getElementById("rnpb");

  if (rnpi.type == "password") {
    rnpi.type = "text";
    rnpb.innerHTML = '<i class="bi bi-eye"></i>';
  } else {
    rnpi.type = "password";
    rnpb.innerHTML = '<i class="bi bi-eye-slash">';
  }
}

function accountProcess() {
  document.getElementById("account").className = "d-block";
  document.getElementById("password").className = "d-none"
  document.getElementById("shopping").className = "d-none";
  document.getElementById("profile").className = "d-none"
}
function passwordProcess() {
  document.getElementById("account").className = "d-none";
  document.getElementById("password").className = "d-block"
  document.getElementById("shopping").className = "d-none";
  document.getElementById("profile").className = "d-none"
}
function shippingProcess() {
  document.getElementById("account").className = "d-none";
  document.getElementById("password").className = "d-none"
  document.getElementById("shopping").className = "d-block";
  document.getElementById("profile").className = "d-none"
}
function profileProcess() {
  document.getElementById("account").className = "d-none";
  document.getElementById("password").className = "d-none"
  document.getElementById("shopping").className = "d-none";
  document.getElementById("profile").className = "d-block"
}

function saveDetails() {
  // alert("ok");

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var uname = document.getElementById("uname");
  var birth = document.getElementById("birth");
  var mobile = document.getElementById("mobile");
  var email = document.getElementById("email")
  var gender = document.getElementById("gen");
  var bio = document.getElementById("bio");

  var f = new FormData();
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("uname", uname.value);
  f.append("birth", birth.value);
  f.append("mobile", mobile.value);
  f.append("email", email.value);
  f.append("gender", gender.value);
  f.append("bio", bio.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);
      location.reload();
    }
  };

  request.open("POST", "saveDetailsProcess.php", true);
  request.send(f);

}

function saveSDetails() {
  // alert("ok");
  var con = document.getElementById("con");
  var pro = document.getElementById("pro");
  var dis = document.getElementById("dis");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var pc = document.getElementById("pc");

  var f = new FormData();
  f.append("con", con.value);
  f.append("pro", pro.value);
  f.append("dis", dis.value);
  f.append("line1", line1.value);
  f.append("line2", line2.value);
  f.append("pc", pc.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);
      location.reload();
    }
  }
  request.open("POST", "saveSDetailsProcess.php", true);
  request.send(f);

}

function changeImgProfile() {


  var image = document.getElementById("imgUploader");

  // alert(image);
  var f = new FormData();
  f.append("image", image.files[0]);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);
    }
  };


  request.open("POST", "updateImgProfile.php", true);
  request.send(f);

}

function addtoCart(x) {
  // alert(x);

  var productId = x;
  var qty = document.getElementById("qty");

  if (qty.value != "") {
    // alert(productId);

    var f = new FormData();
    f.append("proId", productId);
    f.append("qty", qty.value);

    // alert(productId.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        alert(response);



      }
    };

    request.open("POST", "addtoCartProcess.php", true);
    request.send(f);

  } else {
    // alert("Please Enter Your Qty");
    swal("techno.com", "Please Enter Your Qty", "error");

  }
}


function loadCart() {
  // alert("ok");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("cardBody").innerHTML = response;


    }
  };
  request.open("POST", "loadCartProcess.php", true);
  request.send();
}

function removeCart(x) {
  // alert(x);
  if (confirm("Are You Sure Deleting this item?")) {

    var f = new FormData();
    f.append("c", x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        alert(response);
        location.reload();
      }
    };
    request.open("POST", "removeCartProcess.php", true);
    request.send(f);

  }
}


function payNow(id) {

  var qty = document.getElementById("qty").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;
      // alert(response);

      var obj = JSON.parse(response);

      var mail = obj["email"];
      var amount = obj["amount"];

      if (response == 1) {
        swal("techno.com", "Please Login.", "warning");
        window.location = "index.php";
      } else if (response == 2) {
        alert("Please update your profile.");
        window.location = "userProfile.php";
      } else {

        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          alert("Payment completed. OrderID:" + orderId);
          saveInvoice(orderId, id, mail, amount, qty);

        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          "sandbox": true,
          "merchant_id": obj["mid"],    // Replace your Merchant ID
          "return_url": "http://localhost/techno/singleProductView.php?id=" + id,     // Important
          "cancel_url": "http://localhost/techno/singleProductView.php?id=" + id,     // Important
          "notify_url": "http://sample.com/notify",
          "order_id": obj["id"],
          "items": obj["item"],
          "amount": amount + ".00",
          "currency": "LKR",
          "hash": obj["hash"], // *Replace with generated hash retrieved from backend
          "first_name": obj["fname"],
          "last_name": obj["lname"],
          "email": obj["email"],
          "phone": obj["mobile"],
          "address": obj["address"],
          "city": obj["city"],
          "country": "Sri Lanka",
          "delivery_address": obj["address"],
          "delivery_city": obj["city"],
          "delivery_country": "Sri Lanka",
          "custom_1": "",
          "custom_2": ""
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
        // };

      }

    }
  }

  request.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
  request.send();
}








function saveInvoice(orderId, id, mail, amount, qty) {

  var form = new FormData();
  form.append("o", orderId);
  form.append("i", id);
  form.append("m", mail);
  form.append("a", amount);
  form.append("q", qty);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;

      if (response == "success") {
        window.location = "invoice.php?id=" + orderId;
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "saveInvoiceProcess.php", true);
  request.send(form);

}

function printInvoice() {
  var restorePage = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorePage;
}


function addvanceSearch(x) {
  // alert(x);

  var page = x;
  var color = document.getElementById("color");
  var cat = document.getElementById("cat");
  var model = document.getElementById("model");
  var brand = document.getElementById("brand");
  var min = document.getElementById("min");
  var max = document.getElementById("max");

  var f = new FormData();
  f.append("pg", page);
  f.append("color", color.value);
  f.append("cat", cat.value);
  f.append("brand", brand.value);
  f.append("model", model.value);
  f.append("min", min.value);
  f.append("max", max.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("add").innerHTML = response;
    }
  };
  request.open("POST", "addSearchProductProcess.php", true);
  request.send(f);

}


function loadChart() {
  const ctx = document.getElementById('userChart');

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 & r.status == 200) {
      var response = r.responseText;
      // alert(response);
      var data = JSON.parse(response);


      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: data.labels,
          datasets: [{
            label: '# of Votes',
            data: data.data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {

            response: true

          }


        }
      });
    }
  }
  r.open("POST", "loadChartProcess.php", true);
  r.send();

}

function onLoadHandler1() {
  // alert("ok");
  const cta = document.getElementById('productChart');

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 & r.status == 200) {
      var response = r.responseText;
      // alert(response);
      var data = JSON.parse(response);


      new Chart(cta, {
        type: 'bar',
        data: {
          labels: data.labels,
          datasets: [{
            label: '# of Votes',
            data: data.data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {

            response: true

          }


        }
      });
    }
  }
  r.open("POST", "loadChartProcessA.php", true);
  r.send();
}

function allusers() {
  document.getElementById("allusers").className = "d-block";
  document.getElementById("active").className = "d-none";
  document.getElementById("deactive").className = "d-none";
  document.getElementById("admin").className = "d-none";

}

function activeUsers() {
  document.getElementById("allusers").className = "d-none";
  document.getElementById("active").className = "d-block";
  document.getElementById("deactive").className = "d-none";
  document.getElementById("admin").className = "d-none";

}

function deactiveUsers() {
  document.getElementById("allusers").className = "d-none";
  document.getElementById("active").className = "d-none";
  document.getElementById("deactive").className = "d-block";
  document.getElementById("admin").className = "d-none";

}

function adminUsers() {
  document.getElementById("allusers").className = "d-none";
  document.getElementById("active").className = "d-none";
  document.getElementById("deactive").className = "d-none";
  document.getElementById("admin").className = "d-block";

}

function activeactive() {
  // alert("ok");
  var aactive = document.getElementById("aactive");

  // alert(aactive.value);

  var f = new FormData();
  f.append("aactive", aactive.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);


    }
  };
  request.open("POST", "activeactive.php", true);
  request.send(f);
}


function ActiveAdmin() {
  // alert("ok");
  var aadmin = document.getElementById("aadmin");

  // alert(aactive.value);

  var f = new FormData();
  f.append("aadmin", aadmin.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);


    }
  };
  request.open("POST", "adminactive.php", true);
  request.send(f);
}

function deactiveActive() {
  // alert("ok");
  var deactiveactive = document.getElementById("deactiveactive");

  // alert(deactiveactive.value);

  var f = new FormData();
  f.append("deactiveactive", deactiveactive.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);


    }
  };
  request.open("POST", "deactiveactive.php", true);
  request.send(f);
}

function disableAdmin() {
  // alert("ok");
  var disableAdmin = document.getElementById("disableAdmin");

  // alert(disableAdmin.value);

  var f = new FormData();
  f.append("disableAdmin", disableAdmin.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      alert(response);


    }
  };
  request.open("POST", "disableAdmin.php", true);
  request.send(f);
}


function printUser() {
  // alert("OK");

  var fullContent = document.body.innerHTML;
  var printarea = document.getElementById("printuserReports").innerHTML;

  document.body.innerHTML = printarea;

  window.print();

  document.body.innerHTML = fullContent;
}


function filterIncome() {
  // alert("ok");
  var from = document.getElementById("from");
  var to = document.getElementById("to");

  // alert(from.value);
  // alert(to.value);

  var f = new FormData();
  f.append("from", from.value);
  f.append("to", to.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("incomeReport").innerHTML = response;
    }
  }
  request.open("POST", "incomeReportProcess.php", true);
  request.send(f);
}


function loadMostChart() {
  const ctd = document.getElementById('MostChart');

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 & r.status == 200) {
      var response = r.responseText;
      // alert(response);
      var data = JSON.parse(response);


      new Chart(ctd, {
        type: 'doughnut',
        data: {
          labels: data.labels,
          datasets: [{
            label: '# of Votes',
            data: data.data,
            borderWidth: 1
          }]
        },
        options: {
          scales: {

            response: true

          }


        }
      });
    }
  }
  r.open("POST", "loadChartProcess.php", true);
  r.send();

}

function forgetPassword() {
  var email = document.getElementById("e");

  if (email.value != "") {

    var f = new FormData();
    f.append("e", email.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        // alert(response);
        if (response == "Success") {
          alert(response);
          window.location = "resetPassword.php";
        } else {
          swal("techno.com", response, "warning");
        }
      }
    };

    request.open("POST", "forgetPasswordProcess.php", true);
    request.send(f);
  }
}


function resetPassword() {
  var vcode = document.getElementById("vcode");
  var np = document.getElementById("np");
  var np2 = document.getElementById("np2");

  var f = new FormData();
  f.append("vcode", vcode.value);
  f.append("np", np.value);
  f.append("np2", np2.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        window.location = "signIn.php";
      } else {
        alert(response);



      }
    }

  };

  request.open("POST", "resetPasswordProcess.php", true);
  request.send(f);
}


function checkout() {
  // alert("ok");
  var f = new FormData();
  f.append("cart", true);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      alert(response);
      var payment = JSON.parse(response);
      doCheckout(payment, "checkoutProcess.php");
    }
  }
  request.open("POST", "paymentProcess.php", true);
  request.send(f);
}
function doCheckout(payment, path) {
  // alert(payment);
  payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed. OrderID:" + orderId);

    var f = new FormData();
    f.append("payment", JSON.stringify(payment));

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        alert(response);
        // var ody =/ JSON.parse(response);

        var ody = JSON.parse(response);

        var mail = ody["email"];
        var amount = ody["amount"];

        if (response == "success") {
           //location.reload();
           console.log("Order completed with ID: " + orderId);

           alert("Payment completed. OrderID:" + orderId);
           saveInvoice(orderId, id, mail, amount, qty);
           // window.location = "invoice.php?id=" + orderId;
           // saveInvoice (orderId, pid,obj["email"], obj["amount"], qty);
          window.location = "index.php";
        } else {
          alert(response);

          payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
  
            alert("Payment completed. OrderID:" + orderId);
            saveInvoice(orderId, id, mail, amount, qty);
          }
        }



      }
    };
    request.open("POST", path, true);
    request.send(f);
  };
  // Payment window closed
  payhere.onDismissed = function onDismissed() {
    // Note: Prompt user to pay again or show an error page
    console.log("Payment dismissed");
  };
  // Error occurred
  payhere.onError = function onError(error) {
    // Note: show an error page
    console.log("Error:" + error);
  };
  // Show the payhere.js popup, when "PayHere Pay" is clicked
  // document.getElementById('payhere-payment').onclick = function (e) {
  payhere.startPayment(payment);
  // };
}




