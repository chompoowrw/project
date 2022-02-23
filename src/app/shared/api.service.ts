import { Observable, throwError } from 'rxjs';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Injectable, Output, EventEmitter } from '@angular/core';
import { catchError, retry, map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';

export interface Users {
  User_ID: number;
  User_Name: string;
  Email: string;
  Password: string;
  Userlevel_ID: string;
}
@Injectable({
  providedIn: 'root'
})
export class ApiService {

  redirectUrl: string | undefined;

  @Output() getLoggedInName: EventEmitter<any> = new EventEmitter();

  constructor(private http: HttpClient) { }

  login(loginForm: any): Observable<any>{
    const loginHeader = {'Content-Type': 'application/json'};
    const body = {
      'username' : loginForm.username,
      'password' : loginForm.password
    }
    return this.http.post<any>(environment.baseUrl + '/api_login.php', body, { headers: loginHeader })
      .pipe(
        retry(1),
        catchError(this.handleError)
      );
  }

  private handleError(error: HttpErrorResponse): any{
    return throwError(error);

  }

  userlogin(loginForm: any): Observable<any> {
    const loginHeader = { 'Content-Type': 'application/json' };
    const body = {
      'email': loginForm.email,
      'password': loginForm.password
    };
    return this.http.post<any>(environment.baseUrl + '/api_login_2.php', body, { headers: loginHeader }).pipe(
      map(
        (Users) => {
          this.setToken(Users[0].User_ID, Users[0].data, Users[0].role_id);
          this.getLoggedInName.emit(true);
          return Users;
        }
      )
    );
  }


  //token
  setToken(token: string, data: string, role_id: string) {
    // localStorage.setItem('token', JSON.stringify(token));
    // localStorage.setItem('userlevel_id', JSON.stringify(Userlevel_ID));
    localStorage.setItem('token', token);
    localStorage.setItem('data', data);
    localStorage.setItem('role_id', role_id);
  }

  //รับค่า token
  getToken() {
    return localStorage.getItem('token');
    // return JSON.parse(localStorage.getItem('data') || '{}');
  }

  //ลบค่า token
  deleteToken() {
    localStorage.removeItem('token');
    localStorage.removeItem('data');
    localStorage.removeItem('role_id');
  }

  //รับค่า Userlevel
  getRole() {
    return localStorage.getItem('role_id');
  }

  isLoggedIn(): boolean {
    const token = this.getToken();
    console.log(token);
    if (token != null) {
      return true
    }
    return false;
  }

  logout(): void{
    localStorage.clear();
    //localStorage.removeItem('data');
  }
}
