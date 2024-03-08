<template>
    <a-layout>
      <a-layout-sider v-model:collapsed="collapsed" :trigger="null" collapsible style="background:white">
        <div class="m-4 text-center text-lg" v-if="collapsed">
                <inertia-link href="route('staff')">KL </inertia-link>
            </div>
            <div class="m-4 text-center text-lg" v-else>
                <inertia-link href="route('staff')">KunLun</inertia-link>
            </div>
            <AdminMenu/>
      </a-layout-sider>
      <a-layout>
        <a-layout-header style="background: #fff; padding: 0">
          <menu-unfold-outlined
            v-if="collapsed"
            class="trigger"
            @click="() => (collapsed = !collapsed)"
          />
          <menu-fold-outlined v-else class="trigger" @click="() => (collapsed = !collapsed)" />
        </a-layout-header>
        <a-layout-content
          :style="{ margin: '24px 16px', padding: '24px', background: '#fff', minHeight: '280px' }"
        >
          <main>
            <slot/>
          </main>
        </a-layout-content>
      </a-layout>
    </a-layout>
  </template>
  <script setup>
  import { ref } from 'vue';
  import { MenuFoldOutlined, MenuUnfoldOutlined } from '@ant-design/icons-vue';
  import AdminMenu from '@/Components/Admin/AdminMenu.vue';

    const collapsed = ref(false);
  </script>
  <style>
  #components-layout-demo-custom-trigger .trigger {
    font-size: 18px;
    line-height: 64px;
    padding: 0 24px;
    cursor: pointer;
    transition: color 0.3s;
  }
  
  #components-layout-demo-custom-trigger .trigger:hover {
    color: #1890ff;
  }
  
  #components-layout-demo-custom-trigger .logo {
    height: 32px;
    background: rgba(255, 255, 255, 0.3);
    margin: 16px;
  }
  
  .site-layout .site-layout-background {
    background: #fff;
  }
  </style>