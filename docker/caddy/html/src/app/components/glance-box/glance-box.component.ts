import { Component, OnInit } from '@angular/core';
import { faThumbtack } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-glance-box',
  templateUrl: './glance-box.component.html',
  styleUrls: ['./glance-box.component.scss']
})
export class GlanceBoxComponent implements OnInit {
  faThumbtack = faThumbtack;

  constructor() { }

  ngOnInit() {
  }

}
