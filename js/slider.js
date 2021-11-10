'use strict';

//ширина слайдера при загрузке
$(document).ready(function() {
  const sliders = $('.slider');
  for (let i = 0; i < sliders.length; i++) {
    const slider = sliders[i];
    let slidesAmount = 1;
    if ($(slider).attr('data-slides')) {
      slidesAmount = $(slider).attr('data-slides');
    }
    const sliderWidth = $(slider).closest('div').width() / slidesAmount;
    $(slider)
      .find('.slides > li')
      .css('width', sliderWidth + 'px');
    //добавляем элементы управления горизонтальные
    if ($(slider).hasClass('horizontal-arrows')) {
      $(slider).prepend('<div class="slider-nav slider-prev bg-fix" data-scroll="-1"></div>');
      $(slider).prepend('<div class="slider-nav slider-next bg-fix" data-scroll="1"></div>');
    }
    //добавление горизонтальных точек
    if ($(slider).hasClass('horizontal-nav')) {
      $(slider).prepend('<div class="control-nav-horizontal control-nav-container"></div>');
    }
    if ($(slider).hasClass('vertical-nav')) {
      $(slider).prepend('<div class="control-nav-vertical control-nav-container"></div>');
    }
    const slidesCount = $(slider).find('.slides > li').length;
    for (let j = 0; j < slidesCount; j++) {
      if ($(slider).hasClass('horizontal-nav')) {
        $(slider).find('.control-nav-horizontal').append('<div class="control-nav-element"></div>');
      }
    }
  }
  $('.control-nav-container').find('.control-nav-element:first-child').addClass('control-nav-element-active');
});

//Изменение ширины слайдер при ресайзе окна
$(window).resize(function() {
  const sliders = $('.slider');
  for (let i = 0; i < sliders.length; i++) {
    const slider = sliders[i];
    const sliderWidth = $(slider).closest('div').width();
    $(slider)
      .find('.slides > li')
      .css('width', sliderWidth + 'px');
  }
});

let canScroll = 1;
const slideSpeed = 1000;
//Клик по точкам вертикального и горизонтального
$('body').on('click', '.control-nav-element', function() {
  if (canScroll === 1) {
    //запрещаем прокрутку пока не закончится прошлая
    canScroll = 0;
    //определяем текущий слайдер что работаем именно в нем
    const slider = $(this).closest('.slider');
    //делаем все точки внутри неактивными
    $(slider).find('.control-nav-element').removeClass('control-nav-element-active');
    //получаем номер точки на которую нажали(соответствует номеру слайда)
    const num = $(this).index();
    //определяем все точки внутри слайдера
    const allDots = $(slider).find('.control-nav-element');
    //для всех точек внутри контейнера точек
    for (let i = 0; i < allDots.length; i++) {
      //если атрибут точки равен номеру кликнутой точки то даём класс актив
      if ($(allDots[i]).index() === num) {
        $(allDots[i]).addClass('control-nav-element-active');
      }
    }
    //Если точка на которую кликнули лежит горизонтально крутим по горизонтали иначе по вертикали
    if ($(this).closest('.control-nav-container').css('flex-direction') === 'row') {
      //получаем ширину слайда
      let deltaOffset = parseInt($(slider).css('width'));
      //Делаем слайды внутри текущего слайдера вряд
      $(slider).find('.slides').css('display', 'flex');
      //Крутим на величину  (ширина на номер точки/слайда минус 1)
      $(slider)
        .find('.slides')
        .animate({
            scrollLeft: deltaOffset * num,
          },
          slideSpeed,
        );
    } else {
      //Получаем высоту слайдера
      let deltaOffset = parseInt($(slider).css('height'));
      //Придаем всем слайдам высоту слайдера
      $(slider)
        .find('.slides')
        .css('height', deltaOffset + 'px');
      //Отображаем слайды один под другим
      $(slider).find('.slides').css('display', 'block');
      //Крутим на величину  (ширина на номер точки/слайда минус 1)
      $(slider)
        .find('.slides')
        .animate({
            scrollTop: deltaOffset * num,
          },
          slideSpeed,
        );
    }
    //снова разрешаем прокрутку
    setTimeout(function() {
      canScroll = 1;
    }, slideSpeed);
  }
});
//клик на стрелку горизонтальную
$('body').on('click', '.slider-nav', function() {
  if (canScroll === 1) {
    canScroll = 0;
    //определяем текущий слайдер что работаем именно в нём
    const slider = $(this).closest('.slider');
    //делаем слайды в строчку
    $(slider).find('.slides').css('display', 'flex');
    //определяем текущую величину прокрутки
    const currOffset = Math.ceil($(slider).find('.slides').scrollLeft());
    //Определяем ширину слайда (на сколько куртить)
    let deltaOffset = parseInt($(slider).css('width'));
    //определяем количество слайдов
    const slidesCount = $(slider).find('.slides > li').length;
    //Направление прокрутки
    if ($(this).attr('data-scroll') === '-1') {
      deltaOffset = -deltaOffset;
    }
    //крутим
    if (Math.ceil(currOffset + deltaOffset) <= 0) {
      //если достигли начала ленты то дальше не едем влево
      $(slider).find('.slides').animate({
          scrollLeft: 0,
        },
        slideSpeed,
      );
    } else if (currOffset + deltaOffset >= slidesCount * Math.abs(deltaOffset)) {
      //если достигли конца ленты -листаем в начало
      $(slider).find('.slides').animate({
          scrollLeft: 0,
        },
        slideSpeed,
      );
    } else {
      //иначе крутим либо вперед либо назад
      $(slider)
        .find('.slides')
        .animate({
            scrollLeft: currOffset + deltaOffset,
          },
          slideSpeed,
        );
    }
    setTimeout(function() {
      canScroll = 1;
    }, slideSpeed);
    //переключаем точки
    //получаем номер точки которая сейчас активна
    const currSlideNum = $(slider).find('.control-nav-element-active').index();
    //определяем номер следующего слайда
    const nextSlideNum = parseInt(currSlideNum) + parseInt($(this).attr('data-scroll'));
    //удаляем у всех точек активность
    $(slider).find('.control-nav-element').removeClass('control-nav-element-active');
    //получаем все точки
    const allDots = $(slider).find('.control-nav-element');
    //управляем активностью точек
    for (let i = 0; i < allDots.length; i++) {
      if (nextSlideNum <= 0) {
        //если достигли начала делаем первые точки активными и все
        $(slider)
          .find('.control-nav-container')
          .find('.control-nav-element:first-child')
          .addClass('control-nav-element-active');
      } else if (nextSlideNum >= slidesCount) {
        //если достигли конца ленты делаем первые точки активными и все
        $(slider)
          .find('.control-nav-container')
          .find('.control-nav-element:first-child')
          .addClass('control-nav-element-active');
      } else {
        //если атрибут точки равен номеру слайда то делаем ее активной
        if ($(allDots[i]).index() === nextSlideNum) {
          $(allDots[i]).addClass('control-nav-element-active');
        }
      }
    }
  }
});
