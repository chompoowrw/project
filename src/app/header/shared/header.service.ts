import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { User } from './header.model';
import { environment } from './../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class HeaderService {

  constructor(private http: HttpClient) { }

  getToken() {
    return localStorage.getItem('token');
  }

  getUser(): Observable<User[]>{
    const apiHeader = { 'Authorization': 'Bearer ' + this.getToken() };
    return this.http.get<User[]>(environment.baseUrl + '/api_show_user.php', { headers: apiHeader });
  }

  // getUsers(): Observable<User[]>{
  //   const apiHeader = {'Content-Type': 'application/json'};
  //   return this.http.get<User[]>(environment.baseUrl + '/api_show_user.php', { headers: apiHeader });
  // }
}
