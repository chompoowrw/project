import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class RegisterService {

  constructor(private http: HttpClient) { }

  register(formValue: any): Observable<any>{
    const registerHeader = { 'Content-Type': 'application/json' };
    return this.http.post<any>(environment.baseUrl + '/api_insert_user.php', formValue);
  }
}
