<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5thWonder.</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        /* CSS cho footer */
        .footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: left;
            font-size: 14px;
            color: #666;
            /* position: fixed; */
            bottom: 0;
            width: 100%;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: inline-block;
        }

        li {
            display: inline;
            margin-right: 10px;
            font-size: 16px;
            color: #E55604;
        }
        a{
            text-decoration: none;
            color: black;
            transition: color 0.3s ease;
            font-size: 17px;
        }
        a:hover{
            color: #E55604;
            text-decoration: underline;
        }
        .fab {
            color: #666;
            margin-right: 10px;
            transition: color 0.3s ease;
        }
        .fab:hover {
            transform: scale(1.1);
        }
        .connect {
            font-size: 18px;
            color: #E55604;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        .blink {
            animation: blink 1s infinite;
            font-size: 18px;
            display: inline-block;
        }
        
        @keyframes blink {
            0% {
                color: #E55604;
                transform: translateX(0);
            }
            50% {
                color: #26577C;
                transform: translateX(-5px);
            }
            100% {
                color: #E55604;
                transform: translateX(0);
            }
        }

        .fab.fa-facebook-f:hover {
            color: #3b5998;
        }

        .fab.fa-youtube:hover {
            color: #c4302b;
        }

        .fab.fa-instagram:hover {
            color: #e4405f;
        }
    </style>
</head>
<body>
    <!-- Nội dung trang web -->
    
    <div class="footer">
        <div>
            <ul>
                <li><a href="">Chính Sách Khách Hàng Thường Xuyên</a></li>
                <li>|</li>
                <li><a href="">Chính Sách Bảo Mật Thông Tin</a></li>
                <li>|</li>
                <li><a href="">Điều Khoản Sử Dụng</a></li>
            </ul>
        </div>
        <p class="blink">CÔNG TY TNHH 5TH WONDER</p>
        <P>Giấy CNĐKDN: 0389254720, đăng ký lần đầu ngày 13/08/2009, đăng ký thay đổi lần thứ 7 ngày 02/02/2019, cấp bởi Sở KHĐT Thành phố Hồ Chí Minh</P>
        <p>Địa chỉ: TP Nha Trang, Việt Nam</p>
        <p>Hotline: 0389254720</p>
        <p class="connect">KẾT NỐI VỚI CHÚNG TÔI</p>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <p>COPYRIGHT &copy; 5THWONDER.COM - All rights reserved.</p>  
    </div>
</body>
</html>