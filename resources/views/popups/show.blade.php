@extends('layouts.app')
@section('styles')
    <style>
.modal {
  display: none; 
  position: fixed; 
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 1.4s;
}

.modal-content {
    margin: 15% auto;
    border: 1px solid #888;
    width: 60%;
    color: white;
    text-align: center;
    font-weight: 900;
}
.modal-content-1 {
    background-color: #000000;
    padding: 20px;
    font-size: 30px;
    text-align: center;
    font-weight: 900;
}
.modal-content-2 {
    background-color: #ffffff;
    padding: 20px;
    color: white;
    font-size: 15px;
    text-align: center;
}
.close-popup{
  -webkit-animation-name: slideOut;
  -webkit-animation-duration: 1.4s;
}
.close {
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    width: 130px;
    background-color: green;
    border: none;
    padding: 10px;
}

.close:hover,
.close:focus {
  color: rgb(80, 69, 69);
  text-decoration: none;
  cursor: pointer;
}

@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes slideOut {
  from {bottom: -300px; opacity: 1} 
  to {bottom: 0; opacity: 0}
}

@keyframes slideOut {
  from {bottom: -300px; opacity: 1}
  to {bottom: 0; opacity: 0}
}


</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><b>{{$popup->title}}</b></h4>
                    <button id="myBtn" class="w-10 btn btn-success mb-3">Demo Popup</button>
                </div>
                <div class="card-body">
                    <div id="popup" class="modal">
                        <div class="modal-content">
                            <div class="modal-content-1">
                                <p>{{$popup->text}}</p>
                            </div>
                            <div class="modal-content-2"> 
                                <button class="close">Close</button>
                            </div>
                        </div>
                    </div>
                    <h5><b>Copy this script for using this popup in your website!</b></h5>
                    <input type="text" value="{{$script}}" style="width:660px; padding:20px;" disabled>
                    <a href="{{url('')}}/api/use_popup/{{$popup->key}}">{{$popup->key}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    let popup = document.getElementById("popup");
    let btn = document.getElementById("myBtn");
    let closeBtn = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        setTimeout(function() {
            popup.style.display = "block";
        }, 2000);
    }
    
    closeBtn.onclick = function() {
        popup.classList.add("close-popup");
        setTimeout(function () {
            popup.style.display = 'none';
        }, 1000);

    }
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.classList.add("close-popup");
            setTimeout(function () {
                popup.style.display = 'none';
            }, 1000);
        }
    }
});
</script>
@endsection