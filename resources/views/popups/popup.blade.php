<html>
    <head>
    <style>
        iframe{
            width: 100%;
            height: 760px;
            overflow: hidden;
            border:none;
        }

        .modal {
        display: none; 
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4); 
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 1.4s;
        }
        .show-popup{
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 1.4s;
        display: block!important;
        }
        .close-popup{
        -webkit-animation-name: slideOut;
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
</head>
<body>
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
    <script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-1.9.0.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    let popup = document.getElementById("popup");
    let closeBtn = document.getElementsByClassName("close")[0];

    setTimeout(function() {
        popup.style.display = "block";
        popup.classList.add("popup-opened");
        let key = "{{$popup->key}}"
        console.log('{{$url}}')
        $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: '{{route('add-view')}}',
            type: 'post',
            data: {key},
            success: function(response){

            }
        });
    }, 1000);

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
</body>
</html>