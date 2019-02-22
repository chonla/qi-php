import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { PostService } from 'src/app/services/post.service';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-edit-post-page',
  templateUrl: './edit-post-page.component.html',
  styleUrls: ['./edit-post-page.component.scss']
})
export class EditPostPageComponent implements OnInit {

  postForm: FormGroup;
  formLocked: boolean;
  status: string;

  constructor(private fb: FormBuilder, private ps: PostService, private router: Router, private activatedRoute: ActivatedRoute) {
    this.formLocked = false;
  }

  ngOnInit() {
    this.ps.get(this.activatedRoute.snapshot.paramMap.get('id')).subscribe(post => {
      this.postForm = this.fb.group({
        id: post.id,
        title: post.title,
        body: post.body
      });
      this.status = post.status;
    });
  }

  publishPost() {
    this.formLocked = true;
    this.postForm.disable();
    this.ps.publish(this.postForm.value).subscribe({
      next: result => {
        console.log('publish', result);
        this.router.navigate(['/admin','posts','edit',result.id]);
        this.formLocked = false;
        this.postForm.enable();
      },
      error: e => {
        this.formLocked = false;
        this.postForm.enable();
      }
    });
  }

  draftPost() {
    this.formLocked = true;
    this.postForm.disable();
    this.ps.saveDraft(this.postForm.value).subscribe({
      next: result => {
        console.log('draft', result);
        this.router.navigate(['/admin','posts','edit',result.id]);
        this.formLocked = false;
        this.postForm.enable();
      },
      error: e => {
        this.formLocked = false;
        this.postForm.enable();
      }
    });
  }

  formPreview() {
    console.log("previewed");
  }

}
