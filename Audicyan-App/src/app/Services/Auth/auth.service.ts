import { Injectable } from '@angular/core';
import { map } from 'rxjs/operators';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, BehaviorSubject } from 'rxjs';
import { Storage } from '@ionic/Storage';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  updateStorage = new BehaviorSubject<boolean>(false);
  ApiUrl = environment.SERVER_URL;

  token = this.storage.get('token').then((val) => {
    this.token = val;
  });

  private httpHeaders = {
    headers: new HttpHeaders(
      {'Content-Type': 'application/json', 'Accept': 'application/json'},
    )
  };

  constructor(private storage: Storage, public http: HttpClient) { }

  login(email: string, password: string): Observable<any> {
    return this.http.post(this.ApiUrl + 'login', {
      'email': email,
      'password': password
    }, this.httpHeaders).pipe(map(res => res));
  }

  userIsLogged() {
    this.storage.get('token').then( (val) => {
        this.updateStorage.next(true);
        return true;
    });
  }
}
