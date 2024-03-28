<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import FormSection from '../Components/FormSection.vue';
import TextInput from '../Components/TextInput.vue';
import InputLabel from '../Components/InputLabel.vue';
import PrimaryButton from '../Components/PrimaryButton.vue';

const form = useForm({
  parentheses_input: '',
});

const validateParentheses = () => {
  form.post(route('valid-parentheses.validate'), {
    preserveScroll: true,
  })
};
</script>

<template>
  <AppLayout>

    <Head title="Valid Parentheses" />
    <template #header>
      Valid Parentheses
    </template>

    <template #main>
      <div>
        <FormSection @submitted="validateParentheses">
          <template #heading>
            Validate Parentheses
          </template>
          <div v-if="validity !== null">
            <p v-if="validity">The parentheses are valid.</p>
            <p v-else>The parentheses are invalid.</p>
          </div>
          <template #form>
            <InputLabel for="parentheses-input" value="Enter Parentheses" />
            <TextInput id="parentheses-input" v-model="form.parentheses_input" required class="block w-full" type="text"
              name="parentheses_input" />
          </template>

          <template #actions>
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Validate</PrimaryButton>
          </template>
        </FormSection>
      </div>
    </template>
  </AppLayout>
</template>
