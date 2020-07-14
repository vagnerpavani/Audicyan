import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder, FormGroup } from '@angular/forms';

  

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  	login: FormGroup;

  	constructor(public formBuilder: FormBuilder) {
		this.login = this.formBuilder.group({
			email: [null, [Validators.email, Validators.required]],
			password: [null, [Validators.minLength(8), Validators.required]],
	  });
 	}	
	
  
  

 	ngOnInit() {}

  onSubmit(){
  	console.log(this.login.value)
  }
}
