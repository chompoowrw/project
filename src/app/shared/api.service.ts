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
    return this.http.post<any>(environment.baseUrl + '/api_login.php', body, { headers: loginForm })
      .pipe(
        retry(1),
        catchError(this.handleError)
      );
  }

  private handleError(error: HttpErrorResponse): any{
    return throwError(error);

  }

  logout(): void{
    localStorage.clear();
    //localStorage.removeItem('data');
  }
}
