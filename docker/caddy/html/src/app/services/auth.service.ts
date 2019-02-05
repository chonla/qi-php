import { Injectable } from '@angular/core';
import { AuthResult } from '../models/auth-result';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Router } from '@angular/router';
import { shareReplay } from 'rxjs/operators'
import { BucketService } from './bucket.service';

@Injectable({
  providedIn: "root"
})
export class AuthService {
  constructor(private http: HttpClient, private router: Router, private bucket: BucketService) {
  }

  isLoggedIn(): boolean {
    return this.bucket.has('token');
  }

  currentUser() {
  }

  checkIn(result: AuthResult) {
    this.bucket.set('token', result.token, result.expiresAt);
    this.router.navigate(['/admin']);
  }

  login(credential): Observable<AuthResult> {
    return this.http.post<AuthResult>(`${environment.baseUrl}/login`, credential).pipe(shareReplay(1));
  }

  logout() {
    this.bucket.delete('token');
  }

}
