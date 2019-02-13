import { Injectable } from '@angular/core';
import { Post } from '../models/post';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PostService {

  constructor(private http: HttpClient) { }

  create(post: Post): Observable<Post> {
    return this.http.post<Post>(`${environment.baseUrl}/posts`, post);
  }

  createDraft(post: Post): Observable<Post> {
    return this.http.post<Post>(`${environment.baseUrl}/posts/draft`, post);
  }

  get(id: string): Observable<Post> {
    return this.http.get<Post>(`${environment.baseUrl}/posts/${id}`);
  }
}
