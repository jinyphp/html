# 지니 HTML
`jiny/html`는 서버사이드 html 코드를 생성할 수 있는 객체 관리 패키지 입니다. 복잡한 html 코드를 데이터 기반으로 빌드를 할 수 있습니다.

## 설치방법
라라벨 프로젝트에서 컴포저를 통하여 페키지를 설치합니다.

```bash
composer require jiny/html
```

## 사용방법
객체 클래스를 통하여 테그를 사용할 수 있습니다. `CTag` 객체는 기본 테그를 생성할 수 원형 객체 입니다. `CTag`는 3개의 인자를 전달받습니다.

```php
$el = new CTag('div',true, "body...");
```




