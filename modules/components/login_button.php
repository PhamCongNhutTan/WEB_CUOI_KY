<button  type="submit" value="1" name="dangxuat" class="btn btn-dark border-0 mx-3" style="background-color:inherit; font-size:22px; border-radius:3rem;">Đăng ký</button>
<button type="button" class="btn btn-dark border-0" data-bs-toggle="modal" style="background-color:inherit; font-size:22px; border-radius:3rem;" data-bs-target="#ModalForm">Đăng nhập</button>
<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body border rounded">
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="myform bg-white">
                    <h1 class="text-center text-dark">Đăng nhập</h1>
                    <form id="loginForm" action="./modules/components/XuLyLogin.php" method="POST">
                        <div class="mb-3 mt-4">
                            <label for="exampleInputEmail1" class="form-label text-dark">Email / Số điện thoại</label>
                            <input type="text" name ="emailOrPhone" class="form-control" style="margin:0px;" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label text-dark">Password</label>
                            <input type="password" name="password" class="form-control" style="margin:0px;" id="exampleInputPassword1">
                        </div>
                        <div id="error-message" class="alert alert-danger d-none" style="background-color: inherit;" ></div>
                        <button type="submit" name="dangnhap" class="btn btn-dark mt-3">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('./modules/components/XuLyLogin.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const errorMessage = document.getElementById('error-message');
                if (data.success) {
                    // If login is successful, redirect or reload the page
                    window.location.href = '../../';
                } else {
                    errorMessage.textContent = data.message;
                    errorMessage.classList.remove('d-none');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>