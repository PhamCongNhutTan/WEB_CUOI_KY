<div class="container" id="lienhe">
    <div class="row">
        <div class="card" style="width: 22rem;">
            <i class="fa-solid fa-mobile"></i>
            <div class="card-body">
                <p>+84 347 343 966</p>
                <p>+84 012 324 657</p>
            </div>
        </div>
        <div class="card" style="width: 22rem;">
            <i class="fa-solid fa-house"></i>
            <div class="card-body">
                <p>Đường Đồng Khởi, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh</p>
            </div>
        </div>
        <div class="card" style="width: 22rem;">
            <i class="fa-solid fa-envelope"></i>
            <div class="card-body">
                <p>nhuttandeptrai@gmail.com</p>
                <p>tanmasterchef@cooking.food</p>
            </div>
        </div>
    </div>
    <form method="POST" action="admincp/modules/thongtinlienhe/excute.php" enctype="multipart/form-data">
        <div class="row">
            <h3>Để lại lời nhắn cho chúng tôi</h3>
            <div class="col-12 col-md-4">
                <input type="text" class="form-control" id="lh_ten" placeholder="Tên của bạn" name="name">
            </div>
            <div class="col-12 col-md-4">
                <input type="email" class="form-control" id="lh-email" aria-describedby="emailHelp" placeholder="Email" name="gmail">
                <div id="emailHelp" class="form-text">Chúng tôi sẽ không chia sẻ email của bạn với bất kỳ ai.</div>
            </div>
            <div class="col-12 col-md-4">
                <input type="tel" class="form-control" id="lh_phone" placeholder="Số điện thoại" name="phone">
            </div>
            <div class="col-12">
                <textarea type="text" class="form-control" id="lh_message" placeholder="Thông điệp" rows="5" name="message"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-send-message" name="guithongdiep">Gửi Thông Điệp</button>
    </form>
</div>