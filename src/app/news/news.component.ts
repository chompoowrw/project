import { Component, OnDestroy, OnInit } from '@angular/core';
import { NewsService } from './shared/news.service';
import { News, Article } from './shared/news.model';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.css']
})
export class NewsComponent implements OnInit, OnDestroy {
  //news: News | undefined;
  totalResults: number | undefined;
  articles: Article[] | undefined;
  sub: Subscription | undefined;
  imgLoad: string = './assets/images/loading.gif';
  imgWidth: number = 150;
  isShow: boolean = true;

  constructor(private newsService: NewsService) { }

  ngOnInit(): void {
    this.getNews();
  }

  getNews(): void{
    this.sub = this.newsService.getNews().subscribe(
    (news) => {
        //console.log(news);
        //this.news = news;
        this.totalResults = news.totalResults;
        this.articles = news.articles;
      },
      (error) => { // error
        console.log(error);
        this.isShow = false;
      },
      () => { // success
        this.isShow = false;
      }
    );
  }

  ngOnDestroy(): void {
    this.sub?.unsubscribe();
  }
}
