{% extends "layout/layout.volt" %}
{% block title %}phalcon demo 1{% endblock %}
{% block body %}
    <div class="jumbotron">
        <h1>Welcome to EVA</h1>
        <p>基于phalcon的多模块框架</p>
        <p>{{ link_to('register', 'Try it for Free &raquo;', 'class': 'btn btn-primary btn-large btn-success') }}</p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2>多模块</h2>
            <p>Create, track and export your invoices online. Automate recurring invoices and design your own invoice using our invoice template and brand it with your business logo. </p>
        </div>
        <div class="col-md-4">
            <h2>组织灵活</h2>
            <p>Gain critical insights into how your business is doing. See what sells most, who are your top paying customers and the average time your customers take to pay.</p>
        </div>
        <div class="col-md-4">
            <h2>完整的工作流</h2>
            <p>Invite users and share your workload as invoice supports multiple users with different permissions. It helps your business to be more productive and efficient. </p>
        </div>
    </div>
{% endblock%}