const togglePassword = document.querySelector('#togglePassword');
			const password = document.querySelector('#employeeno');
			
			togglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				password.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});

			const bcpctogglePassword = document.querySelector('#bcpctogglePassword');
			const bcpcemployee_no = document.querySelector('#bcpcemployeeno');
			
			bcpctogglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = bcpcemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
				bcpcemployee_no.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});

			const lupontogglePassword = document.querySelector('#lupontogglePassword');
			const luponemployee_no = document.querySelector('#luponemployeeno');
			
			lupontogglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = luponemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
				luponemployee_no.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});

			const vawctogglePassword = document.querySelector('#vawctogglePassword');
			const vawcemployee_no = document.querySelector('#vawcemployeeno');
			
			vawctogglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = vawcemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
				vawcemployee_no.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});

			const complaintstogglePassword = document.querySelector('#complaintstogglePassword');
			const complaintsemployee_no = document.querySelector('#complaintsemployeeno');
			
			complaintstogglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = complaintsemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
				complaintsemployee_no.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});

			const accountingtogglePassword = document.querySelector('#accountingtogglePassword');
			const accountingemployee_no = document.querySelector('#accountingemployeeno');
			
			accountingtogglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = accountingemployee_no.getAttribute('type') === 'password' ? 'text' : 'password';
				accountingemployee_no.setAttribute('type', type);
				// toggle the eye slash icon
				this.classList.toggle('fa-eye-slash');
			});