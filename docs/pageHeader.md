### CPageHeader 클래스 사용법

`CPageHeader` 클래스는 HTML 페이지의 `<head>` 섹션을 쉽게 구성하고 렌더링할 수 있도록 도와줍니다. 이 클래스는 페이지의 제목, CSS 파일, CSS 스타일, JavaScript 파일 및 스크립트를 관리하고 출력하는 기능을 제공합니다.

#### 1. 클래스 초기화
```php
$pageHeader = new CPageHeader('페이지 제목');
```
- `CPageHeader` 객체를 생성할 때 페이지의 제목을 지정할 수 있습니다.

#### 2. CSS 파일 추가
```php
$pageHeader->addCssFile('styles.css');
```
- 페이지에 추가할 CSS 파일을 지정합니다. 이 파일은 `<link>` 태그로 `<head>` 섹션에 포함됩니다.

#### 3. CSS 스타일 추가
```php
$pageHeader->addStyle('body { background-color: #f0f0f0; }');
```
- 직접 CSS 스타일을 추가할 수 있습니다. 이 스타일은 `<style>` 태그로 출력됩니다.

#### 4. JavaScript 파일 추가
```php
$pageHeader->addJsFile('script.js');
```
- JavaScript 파일을 `<head>` 섹션에 추가합니다. `<script>` 태그로 포함됩니다.

#### 5. JavaScript 스크립트 추가 (파일 포함 전)
```php
$pageHeader->addJsBeforeScripts('console.log("페이지 로드 전");');
```
- JavaScript 파일을 포함하기 전에 실행할 스크립트를 추가합니다. 이 스크립트는 `<script>` 태그로 출력됩니다.

#### 6. JavaScript 스크립트 추가 (파일 포함 후)
```php
$pageHeader->addJs('console.log("페이지 로드 후");');
```
- JavaScript 파일을 포함한 후에 실행할 스크립트를 추가합니다. 이 스크립트도 `<script>` 태그로 출력됩니다.

#### 7. 페이지 헤더 출력
```php
$pageHeader->display();
```
- 설정된 모든 요소를 HTML로 출력합니다. `display()` 메서드를 호출하면 `<head>` 섹션이 완성됩니다.

#### 8. 활용 예제

```php
$pageHeader = new CPageHeader('내 웹페이지');
$pageHeader->addCssFile('styles/main.css')
           ->addJsFile('scripts/main.js')
           ->addStyle('body { font-family: Arial, sans-serif; }')
           ->addJsBeforeScripts('console.log("헤더 스크립트 실행");')
           ->addJs('console.log("페이지 로드 완료");')
           ->display();
```
- 이 예제는 "내 웹페이지"라는 제목을 가진 페이지를 생성하며, `styles/main.css`와 `scripts/main.js` 파일을 포함합니다. 추가로 `body` 태그의 폰트를 설정하고, JavaScript 로깅을 위한 코드를 포함합니다.

이 설명은 `CPageHeader` 클래스를 사용하여 HTML 페이지의 `<head>` 섹션을 어떻게 구성하고 활용할 수 있는지에 대한 가이드를 제공합니다.