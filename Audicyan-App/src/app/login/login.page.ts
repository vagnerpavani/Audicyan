import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder, FormGroup } from '@angular/forms';
import { AuthService } from '../Services/Auth/auth.service';
import { NavController } from '@ionic/angular';
import { Storage } from '@ionic/Storage';


  

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  	login: FormGroup;

  	constructor(public formBuilder: FormBuilder, public auth : AuthService, private storage : Storage, public navCtrl: NavController) {
		this.login = this.formBuilder.group({
			email: [null, [Validators.email, Validators.required]],
			password: [null, [Validators.minLength(8), Validators.required]],
	  });
 	}	
	
	ngOnInit() {} 

  onSubmit(loginData){
  	this.auth.login(loginData.value.email, loginData.value.password).subscribe(
  	  (res) => {
  	    this.storage.set('token', res.success.token);
  	    this.storage.set('id', res.success.user);
  	    this.auth.userIsLogged();
	
        this.navCtrl.navigateForward('/home');	
  	  },
  	  (error) => {
  	    //this.presentAlert();
  	    console.log('Erro ao logar');
  	    console.log(error);
  	  }
  	);
  }
}

