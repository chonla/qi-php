import { Component, OnInit } from '@angular/core';
import { DashboardService } from 'src/app/services/dashboard.service';
import { DashboardInfo } from 'src/app/models/dashboard-info';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-dashboard-page',
  templateUrl: './dashboard-page.component.html',
  styleUrls: ['./dashboard-page.component.scss']
})
export class DashboardPageComponent implements OnInit, OnDestroy {

  info: DashboardInfo;
  info$: Subscription;

  constructor(private dashboardService: DashboardService) {
  }

  ngOnInit() {
    this.info$ = this.dashboardService.summary().subscribe(data => {
      this.info = data;
    });
  }

  ngOnDestroy() {
    if (this.info$) {
      this.info$.unsubscribe();
    }
  }

}
