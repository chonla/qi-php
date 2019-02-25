import { Component, OnInit, Input } from '@angular/core';
import { faThumbtack, faEyeSlash } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-glance-box',
  templateUrl: './glance-box.component.html',
  styleUrls: ['./glance-box.component.scss']
})
export class GlanceBoxComponent implements OnInit {
  @Input() info?;

  faThumbtack = faThumbtack;
  faEyeSlash = faEyeSlash;

  constructor() { }

  ngOnInit() {
  }

}
