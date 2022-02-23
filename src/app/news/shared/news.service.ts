import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { News } from './news.model';

@Injectable({
  providedIn: 'root'
})
export class NewsService {
  newsApi: string = 'https://newsapi.org/v2/top-headlines?country=th&category=business&apiKey=3461dc1511a846acabc1244c88ad97da';

  constructor(private http: HttpClient) { }

  getNews(): Observable<News>{
    return this.http.get<News>(this.newsApi);

  }
}
