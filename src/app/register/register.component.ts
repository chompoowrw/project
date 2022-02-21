import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router';
import { Subscription } from 'rxjs';
import { RegisterService } from './shared/register.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit, OnDestroy {
  sub: Subscription | undefined;

  constructor(private registerService: RegisterService,
              private router: Router) { }

  ngOnInit(): void {

  }


  register(formValue: any): void {
    /*alert('OK');
    console.log(formValue);*/
    this.registerService.register(formValue).subscribe(
      (feedback) => {
        alert(feedback.message);
        this.router.navigate(['/']);
      }
    );
  }
  ngOnDestroy(): void{
    this.sub?.unsubscribe();
  }
}

