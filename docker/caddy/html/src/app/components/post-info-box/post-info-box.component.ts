import { Component, OnInit, Input } from '@angular/core';
import { faThumbtack } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-post-info-box',
  templateUrl: './post-info-box.component.html',
  styleUrls: ['./post-info-box.component.scss']
})
export class PostInfoBoxComponent implements OnInit {
  faThumbtack = faThumbtack;

  @Input('status') status: string;

  constructor() {
  }

  ngOnInit() {
  }
}
