/**
 * Copyright (c) 2009 Sergiy Kovalchuk (serg472@gmail.com)
 * 
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *  
 * Following code is based on Element.mask() implementation from ExtJS framework (http://extjs.com/)
 *
 */
;(function($){
	
	/**
	 * Displays loading mask over selected element(s). Accepts both single and multiple selectors.
	 *
	 * @param label Text message that will be displayed on top of the mask besides a spinner (optional). 
	 * 				If not provided only mask will be displayed without a label or a spinner.  	
	 * @param delay Delay in milliseconds before element is masked (optional). If unmask() is called 
	 *              before the delay times out, no mask is displayed. This can be used to prevent unnecessary 
	 *              mask display for quick processes.   	
	 */
	$.fn.mask = function(label, delay){
		$(this).each(function() {
			if(delay !== undefined && delay > 0) {
		        var element = $(this);
		        element.data("_mask_timeout", setTimeout(function() { $.maskElement(element, label)}, delay));
			} else {
				$.maskElement($(this), label);
			}
		});
	};
	
	/**
	 * Removes mask from the element(s). Accepts both single and multiple selectors.
	 */
	$.fn.unmask = function(){
		$(this).each(function() {
			$.unmaskElement($(this));
		});
	};
	
	/**
	 * Checks if a single element is masked. Returns false if mask is delayed or not displayed. 
	 */
	$.fn.isMasked = function(){
		return this.hasClass("masked");
	};

	$.maskElement = function(element, label){
	
		//if this element has delayed mask scheduled then remove it and display the new one
		if (element.data("_mask_timeout") !== undefined) {
			clearTimeout(element.data("_mask_timeout"));
			element.removeData("_mask_timeout");
		}

		if(element.isMasked()) {
			$.unmaskElement(element);
		}
		
		if(element.css("position") == "static") {
			element.addClass("masked-relative");
		}
		
		element.addClass("masked");
		
		var maskDiv = $('<div class="loadmask"></div>');
		
		//auto height fix for IE
		if(navigator.userAgent.toLowerCase().indexOf("msie") > -1){
			maskDiv.height(element.height() + parseInt(element.css("padding-top")) + parseInt(element.css("padding-bottom")));
			maskDiv.width(element.width() + parseInt(element.css("padding-left")) + parseInt(element.css("padding-right")));
		}
		
		//fix for z-index bug with selects in IE6
		if(navigator.userAgent.toLowerCase().indexOf("msie 6") > -1){
			element.find("select").addClass("masked-hidden");
		}
		
		element.append(maskDiv);
		
		if(label !== undefined) {
			var maskMsgDiv = $('<div class="loadmask-msg" style="display:none;"></div>');
			maskMsgDiv.append('<div>' + label + '</div>');
			element.append(maskMsgDiv);
			
			//calculate center position
			maskMsgDiv.css("top", Math.round(element.height() / 2 - (maskMsgDiv.height() - parseInt(maskMsgDiv.css("padding-top")) - parseInt(maskMsgDiv.css("padding-bottom"))) / 2)+"px");
			maskMsgDiv.css("left", Math.round(element.width() / 2 - (maskMsgDiv.width() - parseInt(maskMsgDiv.css("padding-left")) - parseInt(maskMsgDiv.css("padding-right"))) / 2)+"px");
			
			maskMsgDiv.show();
		}
		
	};
	
	$.unmaskElement = function(element){
		//if this element has delayed mask scheduled then remove it
		if (element.data("_mask_timeout") !== undefined) {
			clearTimeout(element.data("_mask_timeout"));
			element.removeData("_mask_timeout");
		}
		
		element.find(".loadmask-msg,.loadmask").remove();
		element.removeClass("masked");
		element.removeClass("masked-relative");
		element.find("select").removeClass("masked-hidden");
	};
 
})(jQuery);
/**
 * @author zzl19892012@gmail.com
 * @description This is a plugin extend Jquery for dataGrid generate by json data get from backend
 *
 * 这个插件采用DIV布局形式展示一个表格，类似Ext的GRID
 * 
 */
;(function($, window, document, undefined){

	/**
	 * gridClass对象,
	 *
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	var gridClass = function(ele, opt) {
		this.$element = ele,
		this.defaults = {
			toolBar: false,
			numberIndex: false,
			numberIndexWidth: 0.03,
			condition: {},
			container: '.dataGrid',
			pageSize: [20, 30, 50, 100],
			url: '',
			method: 'get',
			height: 500,
			condition: {
				start: 0,
				length: 20
			},
			field: [],
			hasLongText: false,
			title: {
				name: 'Data Grid',
				className: ''
			},
			rowCallBack: false
		},
		this.options = $.extend({}, this.defaults, opt);
	}

	// Defined gridClass's methods and attributes
	var fn = gridClass.prototype;

	/**
	 * 构造函数
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	fn.init = function() {

		var opt = this.options, dgToolBar, dgTitle, dgHeader, dgBody, dgFooter;

		this._renderTitle(opt, dgTitle);
		if(opt.toolBar) {
			dgToolBar = document.createElement('div');
			dgToolBar.className = 'dbtoolbar';

			this.$element.append(dgToolBar);
		}

		if(opt.field.length == 0) {
			this.$element.html('错误');
			return false;
		}
		this._renderHeader(opt, dgHeader);

		dgBody = document.createElement('div');
		dgBody.className = 'dgbody';
		dgBody.style.height = opt.height + 'px';
		dgBody.setAttribute('id', 'dgbody');
		this.$element.append(dgBody);

		dgFooter = document.createElement('div');
		dgFooter.className = 'dgfooter';

		// page size options
		var pgoptions = '';
		var that = this;
		$.each(that.options.pageSize, function(index, val) {
			 pgoptions += '<option value="'+val+'">'+val+'</option>';
		});
		dgFooter.innerHTML = '<span>每页<select id="page-size" class="page-size">'+pgoptions+'</select>记录</span> &nbsp;'+
		'<a href="javascript:void(0);" class="page-btn page-first page-disable"><span></span></a>&nbsp;'+
		'<a href="javascript:void(0);" class="page-btn page-pre page-disable"><span></span></a>&nbsp;'+
		'第<select id="page" class="page-size"><option value="1">1</option></select>页'+
		'<a href="javascript:void(0);" class="page-btn page-next page-disable"><span></span></a>&nbsp;'+
		'<a href="javascript:void(0);" class="page-btn page-last page-disable"><span></span></a>&nbsp;'+
		'<a href="javascript:void(0);" class="page-btn page-refresh"><span></span></a>&nbsp;'+
		'<span class="page-right">展示 <span id="page-total">0</span> 条数据中的 '+
		'<span id="page-start">0</span> 到 <span id="page-end">0</span> 条</span>';
		dgFooter.setAttribute('id', 'dgfooter');
		this.$element.append(dgFooter);
		this._bindEvent();

		this._loadBody();
	}

	/**
	 * 设置绑定事件
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-06
	 */
	fn._bindEvent = function() {
		var that = this;
		$('#page-size').change(function(event) {
			that._loadBody({length: $(this).val()});
		});

		$('#page').change(function(event) {
			that._loadBody({start: ($(this).val()-1)*that.options.condition.length});
		});

		$('.page-first').click(function(event) {
			if(!$(this).hasClass('page-disable')) {
				that._loadBody({start: 0});
			}
		});
		
		$('.page-pre').click(function(event) {
			if(!$(this).hasClass('page-disable')) {
				that._loadBody({start: ($('#page').val()-2)*that.options.condition.length});
			}
		});
		
		$('.page-next').click(function(event) {
			if(!$(this).hasClass('page-disable')) {
				that._loadBody({start: ($('#page').val())*that.options.condition.length});
			}
		});
		
		$('.page-last').click(function(event) {
			if(!$(this).hasClass('page-disable')) {
				that._loadBody({start: ($('#page option:last').attr('value') - 1)*that.options.condition.length});
			}
		});

		$('.page-refresh').click(function(event) {
			that.resize();
			that._loadBody();
		});
		
	}

	/**
	 * [重新加载gridClass,condition为空时，则使用默认条件]
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	fn.reload = function(condition) {
		this._loadBody(condition);
	}

	/**
	 * 私有方法，获取数据, 返回json数据类型
	 *
	 * @return {[json]}   [返回数据类型]
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	fn._loadBody = function(condition) {
		$(this.options.container).mask('数据加载中... ...');
		document.getElementById('dgbody').innerHTML = '';
		$.extend(this.options.condition, condition);

		var that = this;
		if((this.options.method).toUpperCase() == 'POST') {
			$.post(this.options.url, this.options.condition, function(data, textStatus, xhr) {
				that._renderBodyFooter(data);
			}, 'json');
		}else{
			$.get(this.options.url, this.options.condition, function(data) {
				that._renderBodyFooter(data);
			}, 'json');
		}

	}

	/**
	 * 渲染标题
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	fn._renderTitle = function(opt, dgTitle) {
		dgTitle = document.createElement('div');
		dgTitle.innerHTML = opt.title.name;
		dgTitle.className = 'dgtitle '+ (opt.title.className?opt.title.className:'');
		this.$element.append(dgTitle);
	}

	/**
	 * 渲染head
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	fn._renderHeader = function(opt, dgHeader) {
		dgHeader = document.createElement('div');
		dgHeader.className = 'dghead ';

		var mainWitdh = this.$element.width();
		var left = 0;
		var leftBorder = 0;

		if(this.options.numberIndex) {
			var headField = document.createElement('div');
			headField.className = 'dghead-column-box';
			headField.setAttribute('id', 'index_header');
			headField.setAttribute('col-width', this.options.numberIndexWidth);
			headField.setAttribute('col-index', leftBorder++);
			headField.style.width = mainWitdh * this.options.numberIndexWidth + 'px';

			headField.style.left = (left + leftBorder++)+'px';
			left += mainWitdh * this.options.numberIndexWidth;

			var headItem = document.createElement('div');
			headItem.className = 'dghead-column-item column-align-center';
			headItem.innerHTML = '#';
			headField.appendChild(headItem);
			dgHeader.appendChild(headField);
		}

		$.each(opt.field, function(index, val) {
			if(!val.longText) {
				var headField = document.createElement('div');
				headField.className = 'dghead-column-box ' + (val.headClass?val.headClass:'');
				headField.setAttribute('id', val.name+'_header');
				headField.setAttribute('col-width', val.width);
				headField.style.width = mainWitdh * val.width + 'px';

				headField.style.left = (left + leftBorder++)+'px';
				left += mainWitdh * val.width;

				var headItem = document.createElement('div');
				headItem.className = 'dghead-column-item column-align-' + (val.headAlign?val.headAlign:'left');
				headItem.innerHTML = val.fieldName;
				headField.appendChild(headItem);
				dgHeader.appendChild(headField);
			}

		});
		this.$element.append(dgHeader);
	}

	/**
	 * 渲染body和脚部
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-04
	 */
	fn._renderBodyFooter = function(data) {
		// 未获取到数据
		if(!data.total || data.total == 0) {
			document.getElementById('dgbody').innerHTML = '<div class="no-result">未找到相关数据</div>';
		}else{
			// 获取到数据
			var startRec = data.start;
			var totalRec = data.total;
			var data = data.data;

			var that = this;
			var mainWitdh = this.$element.width();

			$.each(data, function(i, val) {
				var dgRow = document.createElement('div');
				dgRow.className = 'dgRow';
				// 若有序号
				if(that.options.numberIndex) {
					var dgLeft = document.createElement('div');
					dgLeft.className = 'dg-left';
					dgLeft.style.width = mainWitdh * that.options.numberIndexWidth + 'px';

					var dgLeftCell = document.createElement('div');
					dgLeftCell.className = 'dg-cell-item column-align-center';
					dgLeftCell.innerHTML = that.options.condition.start + 1 + i;
					dgLeft.appendChild(dgLeftCell);
					dgRow.appendChild(dgLeft);

					var dgRight = document.createElement('div');
					dgRight.className = 'dg-right';
					dgRight.style.left = mainWitdh * that.options.numberIndexWidth + 'px';
					dgRight.style.width = mainWitdh * (1-that.options.numberIndexWidth) + 'px';
				}else{
					var dgRight = dgRow;
				}

				// 加载数据区域
				var dataField = document.createElement('div');
				dataField.className = 'datafield';
				var dataLeft = 0;
				var dataBorderLeft = 0;

				var longIndex = 1;
				$.each(that.options.field, function(j, field) {
					// 自定义render Function
					if(field.render && typeof field.render == 'function') {
						var fieldText = field.render(val, val[field.name]);
					}else{
						var fieldText = val[field.name]?val[field.name]:'&nbsp;';
					}

					if(field.longText) {
					// 长字段，需要另起一行显示
						var longField = document.createElement('div');
						longField.className = 'dg-long';
						if(longIndex == 1) {
							longField.className = 'dg-long dg-long-first';
							longIndex++;
						}

						var longCell = document.createElement('div');
						longCell.className = 'dg-long-cell';
						longCell.innerHTML = '<div>'+field.fieldName+':</div>&nbsp;<span>'+fieldText+'</span>';
						longField.appendChild(longCell);
						dgRight.appendChild(longField);
					}else{
						var dgCell = document.createElement('div');
						dgCell.style.width = mainWitdh * field.width + 'px';
						dgCell.style.left = mainWitdh * field.width + 'px';
						dgCell.className = 'dg-cell';

						dgCell.style.left = (dataLeft + dataBorderLeft++)+'px';
						dataLeft += mainWitdh * field.width;

						var dgCellItem = document.createElement('div');
						dgCellItem.className = 'dg-cell-item column-align-'+field.itemAlign;
						dgCellItem.innerHTML = fieldText;
						dgCell.appendChild(dgCellItem);
						dataField.appendChild(dgCell);
					}

				});
				dgRight.insertBefore(dataField, dgRight.firstChild);
				dgRow.appendChild(dgRight);
				document.getElementById('dgbody').appendChild(dgRow);
			});

			// 这是底部工具栏的状态
			var maxPage = Math.ceil(Number(totalRec / this.options.condition.length));
			var curPage = Math.ceil(Number(this.options.condition.start/this.options.condition.length))+1;
			var pageOption = '';
			for (var i = 1; i <= maxPage; i++) {
				pageOption += '<option value="'+i+'" '+(curPage ==i?'selected="selected"':'')+'>'+i+'</option>';
			};
			$('#page').html(pageOption);
			$('#page-size').val(this.options.condition.length);

			$('#page-total').html(totalRec);
			$('#page-start').html(startRec+1);
			$('#page-end').html((startRec+this.options.condition.length)> totalRec?totalRec:(startRec+this.options.condition.length));

			if(curPage > 1) {
				$('.page-first').removeClass('page-disable');
				$('.page-pre').removeClass('page-disable');

				if(curPage == maxPage){
					$('.page-last').removeClass('page-disable').addClass('page-disable');
					$('.page-next').removeClass('page-disable').addClass('page-disable');
				}
			}else{
				$('.page-first').removeClass('page-disable').addClass('page-disable');
				$('.page-pre').removeClass('page-disable').addClass('page-disable');

				if(curPage == maxPage){
					$('.page-last').removeClass('page-disable').addClass('page-disable');
					$('.page-next').removeClass('page-disable').addClass('page-disable');
				}else{
					$('.page-last').removeClass('page-disable');
					$('.page-next').removeClass('page-disable');
				}
			}

			// 全部加载完成之后
			if(this.options.rowCallBack && typeof this.options.rowCallBack == 'function') {
				this.options.rowCallBack();
			}
			
		}

		$(this.options.container).unmask();
	}

	/**
	 * 重新布局Grid大小，使其自适应
	 *
	 * @return {[type]}   [description]
	 * @author zhaozl
	 * @since  2015-08-05
	 */
	fn.resize = function() {
		var mainWitdh = this.$element.width();
		var left = 0;
		var leftBorder = 0;
		$('.dghead-column-box').each(function(index, el) {
			$(el).css('width', mainWitdh * $(el).attr('col-width')+'px');
			$(el).css('left', (left + leftBorder++)+'px');
			left += mainWitdh * $(el).attr('col-width');
		});

	}

	// 在插件中使用gridClass对象
    $.fn.dataGrid = function(options) {
        // 创建 gridClass 的实体
        var plugin = new gridClass(this, options);
        //调用其初始化方法
        plugin.init();

        return plugin;
    }

})(jQuery, window, document);