import { Router } from '@angular/router';
import { ApiService } from './../shared/api.service';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit, OnDestroy {
  loginForm = this.fb.group({
    username: ['',[Validators.required]],
    password: ['',[Validators.minLength(8), Validators.required]]
  });
  sublogin: Subscription | undefined;
  isLogin: boolean = false;
  profile: any;

  constructor(private fb: FormBuilder, private apiService: ApiService,
              private router: Router) { }

  ngOnInit(): void {
  }

  login(): void{
    //console.log(this.loginForm.value);
    this.sublogin = this.apiService.login(this.loginForm.value).subscribe(
      (token) => {
        alert(token.message);
        if(token.data){
          localStorage.setItem('data',JSON.stringify(token.data));
          this.isLogin = true;
          this.profile = token.data;
          this.profile.image = '../../assets/images/user.jpg';
          this.router.navigate(['/']);
        }
      },
      (error) => {
        alert(error.name);
      }
    );
  }

  logout(): void {
    this.apiService.logout();
    this.isLogin = false;
    this.loginForm.reset();
    this.router.navigate(['/']);
   }
  ngOnDestroy(): void {
    this.sublogin?.unsubscribe();
  }
}
