function kurumsal_bireysel(deger) {
    if(deger == 1){ //Login- kurumsal kısmı görünür yapma
        document.getElementById("kurumsal").innerHTML = "<div class='field-wrapper input'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-user'><path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'></path><circle cx='12' cy='7' r='4'></circle></svg><input id='username' name='username' type='text' class='form-control' placeholder='Kurumsal Kullanıcı Adı'></div><div class='field-wrapper input mb-2'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-lock'><rect x='3' y='11' width='18' height='11' rx='2' ry='2'></rect><path d='M7 11V7a5 5 0 0 1 10 0v4'></path></svg><input id='password' name='password' type='password' class='form-control' placeholder='Şifre'></div>";
		document.getElementById("bireysel").innerHTML = ' ';
        var bireysel = document.getElementById("bireysel_buton");
        bireysel.classList.remove("btn-primary");
        bireysel.classList.add("btn-outline-primary");
        var kurumsal = document.getElementById("kurumsal_buton");
        kurumsal.classList.remove("btn-outline-primary");
        kurumsal.classList.add("btn-primary");
    }if(deger == 2){ //Login - bireysel kısmı görünür yapma
        document.getElementById("bireysel").innerHTML = "<div class='field-wrapper input'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-user'><path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'></path><circle cx='12' cy='7' r='4'></circle></svg><input id='username' name='username' type='text' class='form-control' placeholder='Bireysel Kullanıcı Adı'></div><div class='field-wrapper input mb-2'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-lock'><rect x='3' y='11' width='18' height='11' rx='2' ry='2'></rect><path d='M7 11V7a5 5 0 0 1 10 0v4'></path></svg><input id='password' name='password' type='password' class='form-control' placeholder='Şifre'></div>";
		document.getElementById("kurumsal").innerHTML = ' ';
        var bireysel = document.getElementById("bireysel_buton");
        bireysel.classList.remove("btn-outline-primary");
        bireysel.classList.add("btn-primary");
        var kurumsal = document.getElementById("kurumsal_buton");
        kurumsal.classList.remove("btn-primary");
        kurumsal.classList.add("btn-outline-primary");
    }if(deger == 3){ //Register - Kurumsal kısmı görünür yapma
        document.getElementById("kurumsal").innerHTML = "<div id='username-field' class='field-wrapper input'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-user'> <path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'></path> <circle cx='12' cy='7' r='4'></circle> </svg> <input id='username' name='username' type='text' class='form-control' placeholder='Kurumsal Kullanıcı Adı'> </div> <div id='email-field' class='field-wrapper input'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-at-sign'> <circle cx='12' cy='12' r='4'></circle> <path d='M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94'></path> </svg> <input id='email' name='email' type='text' value='' placeholder='Email'> </div> <div id='password-field' class='field-wrapper input mb-2'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-lock'> <rect x='3' y='11' width='18' height='11' rx='2' ry='2'></rect> <path d='M7 11V7a5 5 0 0 1 10 0v4'></path> </svg> <input id='password' name='password' type='password' value='' placeholder='Şifre'> </div> <div class='field-wrapper terms_condition'> <div class='n-chk new-checkbox checkbox-outline-primary'> <label class='new-control new-checkbox checkbox-outline-primary'> <input type='checkbox' class='new-control-input'> <span class='new-control-indicator'></span><span><a href='javascript:void(0);'> Üyelik koşullarını </a>kabul ediyorum.</span> </label> </div> </div>";
		document.getElementById("bireysel").innerHTML = '';
        var bireysel = document.getElementById("bireysel_buton");
        bireysel.classList.remove("btn-primary");
        bireysel.classList.add("btn-outline-primary");
        var kurumsal = document.getElementById("kurumsal_buton");
        kurumsal.classList.remove("btn-outline-primary");
        kurumsal.classList.add("btn-primary");
    }
    if(deger == 4){ //Register - bireysel kısmı görünür yapma
        document.getElementById("bireysel").innerHTML = "<div id='username-field' class='field-wrapper input'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-user'> <path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'></path> <circle cx='12' cy='7' r='4'></circle> </svg> <input id='username' name='username' type='text' class='form-control' placeholder='Bireysel Kullanıcı Adı'> </div> <div id='email-field' class='field-wrapper input'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-at-sign'> <circle cx='12' cy='12' r='4'></circle> <path d='M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94'></path> </svg> <input id='email' name='email' type='text' value='' placeholder='Email'> </div> <div id='password-field' class='field-wrapper input mb-2'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-lock'> <rect x='3' y='11' width='18' height='11' rx='2' ry='2'></rect> <path d='M7 11V7a5 5 0 0 1 10 0v4'></path> </svg> <input id='password' name='password' type='password' value='' placeholder='Şifre'> </div> <div class='field-wrapper terms_condition'> <div class='n-chk new-checkbox checkbox-outline-primary'> <label class='new-control new-checkbox checkbox-outline-primary'> <input type='checkbox' class='new-control-input'> <span class='new-control-indicator'></span><span><a href='javascript:void(0);'> Üyelik koşullarını </a>kabul ediyorum.</span> </label> </div> </div>";
		document.getElementById("kurumsal").innerHTML = ' ';
        var bireysel = document.getElementById("bireysel_buton");
        bireysel.classList.remove("btn-outline-primary");
        bireysel.classList.add("btn-primary");
        var kurumsal = document.getElementById("kurumsal_buton");
        kurumsal.classList.remove("btn-primary");
        kurumsal.classList.add("btn-outline-primary");
    }

}