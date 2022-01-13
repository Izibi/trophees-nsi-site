panel.plugin("nsi/blocks", {
  blocks: {
    features: `
        <div @dblclick="open">
            <div v-if="content.text && content.features">
              <h2 v-html="content.headline" class="-margin"></h2>
              <p v-html="content.text" class="-margin"></p>
              <ul class="features">
                <li v-for="(item, index) in content.features" :key="'feature_'+index">
                  {{ index + " " + item.feature }}
                </li>
              </ul>
            </div>
            <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    paragraph: `
        <div @dblclick="open">
          <div v-if="content.text && content.headline">
            <h2 v-html="content.headline" class="-margin"></h2>
            <p class="-margin"><strong>{{ content.header }}</strong></p>
            <p v-html="content.text" class="-margin"></p>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    mosaic: `
        <div @dblclick="open">
          <div v-if="content.headline && content.thumbnails">
            <h2 v-html="content.headline" class="-margin"></h2>
            <ul class="features mosaic">
              <li class="mosaic__thumbnail" v-for="(item, index) in content.thumbnails" :key="'thumb_'+index">
                <div>{{ item.image }}</div>
                <div>{{ item.text }}</div>
              </li>
            </ul>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    calendar: `
        <div @dblclick="open">
          <div v-if="content.headline && content.dates">
            <h2 class="-margin" v-html="content.headline"></h2>
            <ul class="features dates">
              <li class="date" v-for="(item, index) in content.dates" :key="'date_'+index">
                <div>{{ item.icon }}</div>
                <h3>{{ item.date_headline }}</h3>
                <div>{{ item.day }}</div>
                <div>{{ item.hour }}</div>
                <div>{{ item.comment }}</div>
              </li>
            </ul>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    partners: `
        <div @dblclick="open">
          <div v-if="content.headline && content.partners">
            <h2 class="-margin" v-html="content.headline"></h2>
            <div class="-margin" v-html="content.text"></div>
            <ul class="partners -margin">
              <li v-for="(item, index) in content.partners" :key="'partners_'+index">
                <div>{{ item.logo }}</div>
                <div>{{ item.name }}</div>
              </li>
            </ul>
            <div v-html="content.conclusion"></div>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    step: `
        <div @dblclick="open">
          <div v-if="content.text && content.headline">
            <h2 v-html="content.headline"></h2>
            <div v-html="content.text"></div>
            <div v-html="content.image"></div>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    // more blocks
  }
});
