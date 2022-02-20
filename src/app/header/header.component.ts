import { Component, OnInit, OnDestroy } from '@angular/core';
import { HeaderService } from './shared/header.service';
import { ApiService } from './../shared/api.service';
import { Router } from '@angular/router';
import { Subscription } from 'rxjs';

import { User } from './shared/header.model';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit, OnDestroy {


  //สร้างตัวแปรสำหรับเก็บข้อมูลที่ดึงมาจาก API
  user: User[] = [];

  sub: Subscription | undefined;

  //ใน constructor กำหนดให้ headerService กับ apiService เป็นตัวแปรแบบ private และ เรียกใช้งาน HeaderService กับ ApiService
  constructor(private apiService: ApiService, private headerService: HeaderService, private router: Router) {

  }

  ngOnInit(): void {
    // //เรียก function getUser เมื่อ App เริ่มทำงาน
    // this.getUser();
    // this.headerService.getUser().subscribe(
    //   (users) => {
    //     //นำข้อมูลที่ได้เก็บไว้ที่ตัวแปร getCountUser
    //     this.user = users;
    //   }
    // );
  }

  //รับข้อมูลจำนวนผู้ใช้ทั้งหมด
  // getUser(): void{
  //   this.sub = this.headerService.getUser().subscribe(
  //     (users) => {
  //       console.log(users);
  //     }
  //   );
  // }

  //จะถูกเรียก component จะถูกทำลายใช้สำหรับการ unsubscribe พวก observable และ event ต่างๆ ที่ subscribed ไว้เพื่อไม่ให้เกิดปัญหา memory leak
  ngOnDestroy(): void{
    this.sub?.unsubscribe();
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
      return true
    }
  }

  //แบ่งสิทธิ์สำหรับนักศึกษา
  isUser() {
    if (this.apiService.getRole() == '2') {
      return true
    } else {
      return true
    }
  }

  isLogout() {
    if (this.apiService.isLoggedIn()) {
      return false
    } else {
      return true
    }
  }

  issLogin() {
    if (this.apiService.isLoggedIn()) {
      return true
    } else {
      return false
    }
  }

  //ออกจากระบบ
  logout() {
    this.apiService.logout();
    this.router.navigate(['/login']);
  }
}
