
	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Авторизация</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/">Главная</a></li>
							<li class="breadcrumb-item active" aria-current="page">Авторизация</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- ================ end banner area ================= -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Вы еще не зарегистрированы?</h4>
							<p>Переходите на страницу регистрации и не упустите время скидок</p>
							<a class="button button-account" href="register">Зарегистрироваться</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form"  id="contactForm" onsubmit="sendForm(this); return false;">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="Email адрес"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email адрес'" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="pass" placeholder="Введите пароль"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите пароль'" required>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Хочу получать новости</label>
								</div>
							</div>
              <p id="info" style="color: red"></p>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Авторизоваться</button>
								<a href="#">Забыли пароль?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

<!-- Модальное окно -->
<div
  class="modal fade"
  id="myModal"
  data-backdrop="static"
  data-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Вы успешно зарегистрировались!</h5>
      </div>
      <div class="modal-body">И будете перенаправлены на страницу личного кабинета через 2 секунды.</div>
      <div class="modal-footer">Удачных покупок!</div>
    </div>
  </div>
</div>

  <script>
  async function sendForm(form) {
    let formData = new FormData(form);

    let response = await fetch("authUser", {
      method: "POST",
      body: formData,
    });
    let message = await response.json();
    if (message.result == "exist") {
      info.innerText = "Такого пользователя нет";
    } else if (message.result == "success") {
      $("#myModal").modal("show");
      setTimeout(() => {
        location.href = "lk";
      }, 2000);
    }
  }
</script>
