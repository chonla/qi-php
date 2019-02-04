import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ErrorAlertComponent } from '../error-alert/error-alert.component';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';
import { faUser, faKey } from '@fortawesome/free-solid-svg-icons';
import { AuthResult } from 'src/app/models/auth-result';

@Component({
  selector: 'app-login-box',
  templateUrl: './login-box.component.html',
  styleUrls: ['./login-box.component.scss']
})
export class LoginBoxComponent implements OnInit {
  @ViewChild('errorModal') error: ErrorAlertComponent;
  loginForm: FormGroup;
  locked: boolean;
  faUser = faUser;
  faKey = faKey;

  constructor(
    private fb: FormBuilder,
    private auth: AuthService,
    private router: Router //,
    // private modalService: BsModalService
  ) {
    this.initForm();
  }

  initForm() {
    this.loginForm = this.fb.group({
      login: ['', Validators.required],
      pwd: ['', Validators.required]
    });
  }

  onSubmit() {
    this.lock();
    this.error.hide();
    this.auth.login(this.loginForm.value)
      .subscribe({
        next: (result: AuthResult) => {
          this.auth.checkIn(result);
        },
        error: err => {
          if (err.status === 403) {
            this.error.show('ล็อกอินไม่สำเร็จ', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
          } else {
            this.error.show('ล็อกอินไม่สำเร็จ', err.statusText);
          }
          this.unlock();
        }
      });
    return false;
  }

  ngOnInit() {
    this.unlock();
  }

  lock() {
    this.locked = true;
  }

  unlock() {
    this.locked = false;
  }

  createLogin() {
    const createLoginModalOptions = {
      animated: true,
      backdrop: true,
      keyboard: true,
      focus: true,
      ignoreBackdropClick: true
    };
   // this.modalService.show(CreateLoginComponent, createLoginModalOptions);
    return false;
  }
}
