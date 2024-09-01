# `CWidget` 클래스 사용

`CWidget` 클래스는 웹 애플리케이션에서 위젯을 구성하는 데 사용되는 클래스로, 다양한 속성과 메서드를 통해 위젯의 제목, 메뉴, 제어 버튼, 레이아웃 모드 등을 설정할 수 있습니다. 이 문서는 `CWidget` 클래스를 사용하여 태그와 위젯을 만드는 방법에 대해 설명합니다.

## 1. 클래스 속성 및 메서드

### 1.1 속성

- **`$title`**: 위젯의 제목을 저장하는 속성입니다.
- **`$title_submenu`**: 위젯의 제목에 연결된 서브 메뉴를 저장하는 속성입니다.
- **`$controls`**: 위젯의 제어 버튼들을 저장하는 속성입니다.
- **`$kiosk_mode_controls`**: 키오스크 모드에서 사용할 제어 버튼들을 저장하는 속성입니다.
- **`$web_layout_mode`**: 레이아웃 모드를 설정하는 속성입니다.
- **`$navigation`**: 기본 레이아웃 모드에서만 표시되는 네비게이션을 저장하는 속성입니다.
- **`$body`**: 위젯의 본문 내용으로, 배열 형태로 저장됩니다.

### 1.2 메서드

#### `setTitle($title)`

- **설명**: 위젯의 제목을 설정합니다.
- **매개변수**: `$title` - 위젯의 제목 문자열
- **반환값**: `CWidget` 객체 (메소드 체이닝을 위해)

#### `setTitleSubmenu($title_submenu)`

- **설명**: 위젯의 제목에 연결된 서브 메뉴를 설정합니다.
- **매개변수**: `$title_submenu` - 서브 메뉴 내용
- **반환값**: `CWidget` 객체

#### `setControls($controls)`

- **설명**: 위젯의 제어 버튼들을 설정합니다.
- **매개변수**: `$controls` - 제어 버튼들
- **반환값**: `CWidget` 객체

#### `setKioskModeControls($kiosk_mode_controls)`

- **설명**: 키오스크 모드에서 사용할 제어 버튼들을 설정합니다.
- **매개변수**: `$kiosk_mode_controls` - 키오스크 모드 제어 버튼들
- **반환값**: `CWidget` 객체

#### `setWebLayoutMode($web_layout_mode)`

- **설명**: 웹 레이아웃 모드를 설정합니다.
- **매개변수**: `$web_layout_mode` - 레이아웃 모드 정수값
- **반환값**: `CWidget` 객체

#### `setNavigation($navigation)`

- **설명**: 기본 레이아웃 모드에서만 표시되는 네비게이션을 설정합니다.
- **매개변수**: `$navigation` - 네비게이션 데이터
- **반환값**: `CWidget` 객체

#### `addItem($items = null)`

- **설명**: 위젯의 본문 내용에 항목을 추가합니다.
- **매개변수**: `$items` - 추가할 항목 (기본값: `null`)
- **반환값**: `CWidget` 객체

## 1.3 사용 예제

아래는 `CWidget` 클래스를 사용하여 간단한 위젯을 생성하는 예제입니다.

```php
$widget = (new CWidget())
    ->setTitle('위젯 제목')
    ->setTitleSubmenu('서브 메뉴 제목')
    ->setControls(new CButton('버튼'))
    ->setKioskModeControls(new CButton('키오스크 버튼'))
    ->setWebLayoutMode(1)
    ->setNavigation(new CList(['홈', '설정']))
    ->addItem(new CDiv('본문 내용'))
    ->addItem(new CLinkAction('링크 액션'));
```

`CWidget` 클래스를 사용하여 다양한 유형의 위젯을 생성하고 구성할 수 있습니다. `CCollapsibleUiWidget` 및 `CDashboardWidgetMap` 클래스를 활용하여 위젯의 동작 및 표현 방식을 확장할 수 있습니다. 다음은 이들 클래스를 활용하여 위젯을 응용하는 방법에 대한 설명입니다.


### 2. `CCollapsibleUiWidget` 클래스 활용

`CCollapsibleUiWidget` 클래스는 확장 가능한 위젯을 만들기 위해 사용됩니다. 이 클래스는 위젯을 펼치거나 접을 수 있는 기능을 제공합니다.

#### 주요 기능

- **상태 관리**: `expanded` 속성으로 위젯의 펼쳐짐 또는 접힘 상태를 관리합니다.
- **헤더 설정**: `setHeader()` 메서드로 위젯의 헤더를 설정하고, 펼치기 및 접기 아이콘을 추가합니다.
- **빌드 메서드**: `build()` 메서드로 위젯의 HTML을 생성합니다.

#### 사용 예제

```php
$collapsibleWidget = (new CCollapsibleUiWidget())
    ->setTitle('확장 가능한 위젯 제목')
    ->setHeader('헤더 제목', [], 'unique_id')
    ->setExpanded(true)
    ->addItem(new CDiv('위젯 본문 내용'));
```

위 예제는 확장 가능한 위젯을 생성하고, 제목과 헤더를 설정하며, 기본 본문 내용을 추가합니다. `setExpanded(true)`로 위젯을 확장된 상태로 설정합니다.

### 3. `CDashboardWidgetMap` 클래스 활용

`CDashboardWidgetMap` 클래스는 대시보드에서 지도를 표시하는 위젯을 생성합니다. 이 클래스는 지도와 관련된 데이터를 관리하고, 지도를 표시하는 데 필요한 HTML과 JavaScript를 생성합니다.

#### 주요 기능

- **지도 데이터**: `sysmap_data`로 지도의 데이터와 관련된 정보를 저장합니다.
- **오류 처리**: `error` 속성으로 지도 로딩 중 발생한 오류를 표시합니다.
- **스크립트 데이터**: `getScriptData()` 메서드로 위젯의 JavaScript 데이터를 생성합니다.
- **HTML 빌드**: `build()` 메서드로 위젯의 HTML을 생성합니다.

#### 사용 예제

```php
$mapWidget = new CDashboardWidgetMap(
    $sysmapData, // CMapHelper::get()으로 얻은 지도 데이터
    [
        'current_sysmapid' => 1,
        'filter_widget_reference' => 'map_filter',
        'source_type' => WIDGET_SYSMAP_SOURCETYPE_MAP,
        'previous_map' => ['sysmapid' => 0, 'name' => '기본 지도'],
        'initial_load' => 1
    ]
);

echo $mapWidget->toString();
```

위 예제는 지도를 표시하는 대시보드 위젯을 생성하고, 지도 데이터와 관련된 설정을 제공합니다. `toString()` 메서드를 호출하여 위젯의 HTML을 출력합니다.

### 결론

이러한 클래스를 활용하면 웹 애플리케이션에서 다양한 형태의 위젯을 생성하고, 사용자에게 유용한 정보를 제공하거나 인터랙티브한 기능을 추가할 수 있습니다. 각 클래스의 메서드와 속성을 이해하고 적절히 활용하여 필요에 맞는 위젯을 구성해 보세요.