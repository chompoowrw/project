import { Observable, throwError } from 'rxjs';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, retry } from 'rxjs/operators';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

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

  //token
  setToken(data: string, role_id: string) {
    // localStorage.setItem('token', JSON.stringify(token));
    // localStorage.setItem('userlevel_id', JSON.stringify(Userlevel_ID));
    localStorage.setItem('data', data);
    localStorage.setItem('role_id', role_id);
  }

  //รับค่า token
  getToken() {
    return localStorage.getItem('data');
    // return JSON.parse(localStorage.getItem('data') || '{}');
  }

  //ลบค่า token
  deleteToken() {
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
