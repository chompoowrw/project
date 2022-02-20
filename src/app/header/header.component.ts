import { Subscription } from 'rxjs';
import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { ApiService } from './../shared/api.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  loginbtn: boolean;
  logoutbtn: boolean;

  //สร้างตัวแปรสำหรับเก็บข้อมูลที่ดึงมาจาก API

  // sub: Subscription;
  constructor(private apiService: ApiService, private router: Router) {

    if (this.apiService.isLoggedIn()) {
      console.log("loggedin");
      this.loginbtn = false;
      this.logoutbtn = true
    }
    else {
      this.loginbtn = true;
      this.logoutbtn = false
    }
   }

  ngOnInit(): void {
  }

  //แบ่งสิทธิ์สำหรับทุกระดับผู้ใช้
  isLogin() {
    if (this.apiService.isLoggedIn()) {
      return true
    } else {
      return false
    }
  }

  //แบ่งสิทธิ์สำหรับผู้ดูแลระบบ
  isAdmin() {
    if (this.apiService.getRole() == '1') {
      return true
    } else {
      return false
    }
  }

  //แบ่งสิทธิ์สำหรับนักศึกษา
  isUser() {
    if (this.apiService.getRole() == '2') {
      return true
    } else {
      return false
    }
  }

  isLogout() {
    if (this.apiService.isLoggedIn()) {
      return false
    } else {
      return true
    }
  }

  logout(): void {
    this.apiService.logout();
    this.router.navigate(['/']);
   }
}
