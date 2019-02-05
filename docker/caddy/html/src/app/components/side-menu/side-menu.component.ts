import { Component, OnInit } from '@angular/core';
import { faTachometerAlt, faTags, faThumbtack } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-side-menu',
  templateUrl: './side-menu.component.html',
  styleUrls: ['./side-menu.component.scss']
})
export class SideMenuComponent implements OnInit {
  faTachometerAlt = faTachometerAlt;
  faTags = faTags;
  faThumbtack = faThumbtack;

  constructor() { }

  ngOnInit() {
  }

}
