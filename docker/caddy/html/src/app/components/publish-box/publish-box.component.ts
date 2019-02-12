import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { faGlobe, faThumbtack } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-publish-box',
  templateUrl: './publish-box.component.html',
  styleUrls: ['./publish-box.component.scss']
})
export class PublishBoxComponent implements OnInit {
  faGlobe = faGlobe;
  faThumbtack = faThumbtack;

  @Output() submit: EventEmitter<void> = new EventEmitter<void>();
  @Output() draft: EventEmitter<void> = new EventEmitter<void>();
  @Output() preview: EventEmitter<void> = new EventEmitter<void>();

  constructor() { }

  ngOnInit() {
  }

  onSubmit() {
    this.submit.emit();
  }

  onSaveDraft() {
    this.draft.emit();
  }

  onPreview() {
    this.preview.emit();
  }
}
