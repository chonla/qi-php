import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { DashboardService } from 'src/app/services/dashboard.service';
import { DashboardInfo } from 'src/app/models/dashboard-info';

@Component({
  selector: 'app-dashboard-page',
  templateUrl: './dashboard-page.component.html',
  styleUrls: ['./dashboard-page.component.scss']
})
export class DashboardPageComponent implements OnInit {

  info: DashboardInfo;

  constructor(private auth: AuthService, private dashboardService: DashboardService) {
  }

  ngOnInit() {
    console.log(this.auth.isLoggedIn());
    this.dashboardService.summary().subscribe(data => {
      this.info = data;
    });
  }

}
