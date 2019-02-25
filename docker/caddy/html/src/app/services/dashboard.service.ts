import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { DashboardInfo } from '../models/dashboard-info';

@Injectable({
  providedIn: 'root'
})
export class DashboardService {

  constructor(private http: HttpClient) { }

  summary(): Observable<DashboardInfo> {
    return this.http.get<DashboardInfo>(`${environment.apiBaseUrl}/summary`);
  }

}
